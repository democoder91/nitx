<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Exception;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Filters\Video\VideoFilters;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\JsonResponse;
use Intervention\Image\Facades\Image;
use Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class UploadController extends Controller
{
    /**
     * Handles the file upload
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws UploadMissingFileException
     * @throws UploadFailedException
     */

    public function uploadMedia(Request $request, $parentFolderId = null)
    {
        $file = $request->file('file');
        $fileName = str_replace(' ', '-', $file->getClientOriginalName());
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
        $save = $receiver->receive();
        if ($save->isFinished()) {
            return $this->saveFile($save->getFile(), $fileName, $parentFolderId);
        }
        $handler = $save->handler();
        return response()->json([
            "done" => $handler->getPercentageDone(),
            'status' => true
        ]);
    }

    public static function isImageOrVideo($mime)
    {
        if ($mime == 'jpeg' || $mime == 'png' || $mime == 'jpg' || $mime == 'gif' || $mime == 'svg') {
            return 'image';
        } else if ($mime == 'mp4') {
            return 'video';
        }
    }

    /**
     * Saves the file to S3 server
     *
     * @param UploadedFile $file
     *
     * @return JsonResponse
     */
    protected function saveFileToS3($file)
    {
        $fileName = $this->createFilename($file);
        $disk = Storage::disk('s3');
        $disk->putFileAs('photos', $file, $fileName);
        $mime = str_replace('/', '-', $file->getMimeType());
        unlink($file->getPathname());
        return response()->json([
            'path' => $disk->url($fileName),
            'name' => $fileName,
            'mime_type' => $mime
        ]);
    }

    /**
     * Saves the file
     *
     * @param UploadedFile $file
     *
     * @return JsonResponse
     */

    protected function saveFile(UploadedFile $file, $fileName, $parentFolderId)
    {
        $fileType = $this->isImageOrVideo($file->extension());
        $fileSize = $file->getSize();
        $mime = str_replace('/', '-', $file->getMimeType());
        $date = date("Y-m-d");
        $imageThumbnailPath = env('APP_ENV') . '/user-' . auth()->user()->id . "/images-thumbnails/{$mime}/{$date}";
        $imageCompressedPath = env('APP_ENV') . '/user-' . auth()->user()->id . "/compressed-images/{$mime}/{$date}";
        //
        $videoPath = env('APP_ENV') . '/user-' . auth()->user()->id . "/videos/{$date}";
        $videoThumbnailPath = env('APP_ENV') . '/user-' . auth()->user()->id . "/videos-thumbnails/{$date}";
        $videoImageCompressedPath = env('APP_ENV') . '/user-' . auth()->user()->id . "/videos-compressed-images/{$date}";
        $disk = Storage::disk('s3');
        if ($fileType == 'image') {
            $imageSystemName = $this->createFilename($file);
            $width = Image::make($file)->width();
            $height = Image::make($file)->height();
            if ($mime == "image-gif") {
                dd(333);
                $disk->put($imageCompressedPath . '/' . $imageSystemName, $file);
                $disk->put($imageThumbnailPath . '/' . $imageSystemName, $file);
                $compressedMediaURL = Storage::disk('s3')->url($imageCompressedPath . '/' . $imageSystemName);
                $thumbnailMediaURL = Storage::disk('s3')->url($imageThumbnailPath . '/' . $imageSystemName);
                Storage::disk('s3')->setVisibility($compressedMediaURL, 'public');
                Storage::disk('s3')->setVisibility($thumbnailMediaURL, 'public');
                $this->saveFileRecord($imageSystemName, $mime, $fileSize, self::getFileType($mime), $height, $width, $fileName,
                    $parentFolderId, $compressedMediaURL, $thumbnailMediaURL, null);
            } else {
                $compressedImage = Image::make($file)->encode('jpg', 50);
                $thumbnailImage = Image::make($file)->resize(248, 128)->encode('jpg', 80);
                $disk->put($imageCompressedPath . '/' . $imageSystemName, $compressedImage);
                $disk->put($imageThumbnailPath . '/' . $imageSystemName, $thumbnailImage);
                $compressedMediaURL = Storage::disk('s3')->url($imageCompressedPath . '/' . $imageSystemName);
                $thumbnailMediaURL = Storage::disk('s3')->url($imageThumbnailPath . '/' . $imageSystemName);
                Storage::disk('s3')->setVisibility($compressedMediaURL, 'public');
                Storage::disk('s3')->setVisibility($thumbnailMediaURL, 'public');
                $this->saveFileRecord($imageSystemName, $mime, $fileSize, self::getFileType($mime), $height, $width, $fileName,
                    $parentFolderId, $compressedMediaURL, $thumbnailMediaURL, null);
            }
        } else {
            $videoSystemName = $this->createFilename($file);
            $videoThumbnailSystemName = $this->createFilename($file, 'png');
            $videoImageCompressedSystemName = $this->createFilename($file, 'png');
            try {
                $lowBitrateFormat = (new X264)->setKiloBitrate(150);
                $videoPath .= '/' . $videoSystemName;
                $videoThumbnailPath .= '/' . $videoThumbnailSystemName;
                $videoImageCompressedPath .= '/' . $videoImageCompressedSystemName;
                $video = FFMpeg::open($file)
                    ->addFilter(function (VideoFilters $filters) {
                        $filters->resize(new Dimension(1280, 720));
                    })
//                    ->addWatermark(function (WatermarkFactory $watermark) {
//                        $watermark->fromDisk('local')
//                            ->open('logo_color.svg')
//                            ->left(25)
//                            ->top(25);
//                    })
                    ->export()
                    ->toDisk('s3')
                    ->inFormat($lowBitrateFormat)
                    ->save($videoPath);
                $videoURL = Storage::disk('s3')->url($videoPath);

                $videoThumbnail = FFMpeg::open($file)
                    ->getFrameFromSeconds(1)
                    ->resize(248, 128)
                    ->export()
                    ->toDisk('s3')
                    ->save($videoThumbnailPath);

                $videoImageCompressed = FFMpeg::open($file)
                    ->getFrameFromSeconds(1)
                    ->export()
                    ->toDisk('s3')
                    ->save($videoImageCompressedPath);

                $videoThumbnailURL = Storage::disk('s3')->url($videoThumbnailPath);
                $videoImageCompressedURL = Storage::disk('s3')->url($videoImageCompressedPath);

                Storage::disk('s3')->setVisibility($videoURL, 'public');
                Storage::disk('s3')->setVisibility($videoThumbnailURL, 'public');
                Storage::disk('s3')->setVisibility($videoImageCompressedURL, 'public');

                $this->saveFileRecord($videoSystemName, $mime, $fileSize, self::getFileType($mime), null, null, $fileName,
                    $parentFolderId, $videoImageCompressedURL, $videoThumbnailURL, $videoURL);

            } catch (Exception $exception) {
                dd($exception->getMessage());
            }

        }
        unlink($file->getPathname());
        return response()->json([
            'success' => true,
        ]);
    }


    public static function getFileType($fileType)
    {
        return explode('-', $fileType)[0];
    }

    public static function createUserFolder()
    {

    }

    public function saveFileRecord($systemFileName, $mime, $fileSize, $fileType, $height, $width, $fileName, $parentFolderId,
                                   $compressedMediaURL, $thumbnailMediaURL, $videoURL)
    {
        $media = Media::create([
            'name' => $fileName,
            'system_media_name' => $systemFileName,
            'media_aws_s3_url' => null,
            'path' => null,
            'compressed_media_path' => $compressedMediaURL,
            'thumbnail_media_path' => $thumbnailMediaURL,
            'size' => $fileSize,
            'type' => $fileType,
            'parent_folder_id' => $parentFolderId,
            'height' => $height,
            'width' => $width,
            'media_owner_id' => auth()->user()->id,
            'mime' => $mime,
            'video_path' => $videoURL
        ]);
        $media->save();
    }


    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */


    protected function createFilename(UploadedFile $file, $fileExtension = null)
    {
        $fileExtension = $fileExtension ?? $file->getClientOriginalExtension();
        return md5(time() . $file->getClientOriginalName()) . "." . $fileExtension;
    }


}