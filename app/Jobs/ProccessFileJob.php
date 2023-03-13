<?php

namespace App\Jobs;

use App\Models\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Coordinate\FrameRate;
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

class ProccessFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $filePath;
    protected $parentFolderId;
    protected $fileSize;
    protected $mime;
    protected $fileName;
    protected $userId;
    protected $mediaId;
    public function __construct(
        $filePath,
        $parentFolderId,
        $fileSize,
        $mime,
        $fileName,
        $userId,
        $mediaId
    )
    {
        $this->filePath = $filePath;
        $this->parentFolderId = $parentFolderId;
        $this->fileSize = $fileSize;
        $this->mime = $mime;
        $this->fileName = $fileName;
        $this->userId = $userId;
        $this->mediaId = $mediaId;
    }



    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userId = $this->userId;
        $parentFolderId = $this->parentFolderId;
        $fileName = $this->fileName;
        $filePath = $this->filePath;
        $mime = $this->mime;
        $fileSize = $this->fileSize;
        $mediaId = $this->mediaId;

        $file = new UploadedFile(
            $filePath,
            $fileName,
            $mime,
        );



        $date = date("Y-m-d");
        // paths to save the files
        $imageThumbnailPath = env('APP_ENV') . '/user-' . $userId . "/images-thumbnails/{$mime}/{$date}";
        $imageCompressedPath = env('APP_ENV') . '/user-' . $userId . "/compressed-images/{$mime}/{$date}";
        $videoPath = env('APP_ENV') . '/user-' . $userId . "/videos/{$date}";
        $videoThumbnailPath = env('APP_ENV') . '/user-' . $userId . "/videos-thumbnails/{$date}";
        $videoImageCompressedPath = env('APP_ENV') . '/user-' . $userId . "/videos-compressed-images/{$date}";

        // check if the file is a video 
        if ($this->isVideo($file)) {
            $videoSystemName = $this->createFilename($file);
            $videoThumbnailSystemName = $this->createFilename($file, 'png');
            $videoImageCompressedSystemName = $this->createFilename($file, 'png');
            try {
                $lowBitrateFormat = (new X264)->setKiloBitrate(3000);
                $videoPath .= '/' . $videoSystemName;
                $videoThumbnailPath .= '/' . $videoThumbnailSystemName;
                $videoImageCompressedPath .= '/' . $videoImageCompressedSystemName;
                $video = FFMpeg::open($file)
                    ->addFilter(function (VideoFilters $filters) {
                        $filters->resize(new Dimension(1280, 720));
                        $filters->framerate(new FrameRate(30), 30);
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
                
                // get the video duration
                $duration = $video->getDurationInSeconds();
                
                

                $videoThumbnailURL = Storage::disk('s3')->url($videoThumbnailPath);
                $videoImageCompressedURL = Storage::disk('s3')->url($videoImageCompressedPath);

                Storage::disk('s3')->setVisibility($videoURL, 'public');
                Storage::disk('s3')->setVisibility($videoThumbnailURL, 'public');
                Storage::disk('s3')->setVisibility($videoImageCompressedURL, 'public');
                // get the video size after compression
                $videoSize = Storage::disk('s3')->size($videoPath);
                $media = Media::create([
                    'media_owner_id' => auth()->user()->id,
                    'parent_folder_id' => $parentFolderId,
                    'name' => $file->getClientOriginalName(),
                    'type' => 'video',
                    'size' => $videoSize,
                    'mime' => $mime,
                    'video_path' => $videoURL,
                    'thumbnail_media_path' => $videoThumbnailURL,
                    'compressed_media_path' => $videoURL,
                    'width' => 1280,
                    'height' => 720,
                    'duration' => $duration ,
                    'system_media_name' => $videoSystemName,
                    'path' => $videoPath,
                    'media_aws_s3_url'=> $videoURL,
                    
                ]);
            } catch (Exception $exception) {
                dd($exception->getMessage());
            }
            
        } else {
            $imageSystemName = $this->createFilename($file);
            $width = Image::make($file)->width();
            $height = Image::make($file)->height();
            $disk = Storage::disk('s3');
            if ($mime == "image-gif") {
                dd(333);
                $disk->put($imageCompressedPath . '/' . $imageSystemName, $file);
                $disk->put($imageThumbnailPath . '/' . $imageSystemName, $file);
                $compressedMediaURL = Storage::disk('s3')->url($imageCompressedPath . '/' . $imageSystemName);
                $thumbnailMediaURL = Storage::disk('s3')->url($imageThumbnailPath . '/' . $imageSystemName);
                Storage::disk('s3')->setVisibility($compressedMediaURL, 's3');
                Storage::disk('s3')->setVisibility($thumbnailMediaURL, 's3');
            } else {
                $compressedImage = Image::make($file)->encode('jpg', 50);
                $thumbnailImage = Image::make($file)->resize(248, 128)->encode('jpg', 50);
                $disk->put($imageCompressedPath . '/' . $imageSystemName, $compressedImage);
                $disk->put($imageThumbnailPath . '/' . $imageSystemName, $thumbnailImage);
                $compressedMediaURL = Storage::disk('s3')->url($imageCompressedPath . '/' . $imageSystemName);
                $thumbnailMediaURL = Storage::disk('s3')->url($imageThumbnailPath . '/' . $imageSystemName);
                Storage::disk('s3')->setVisibility($compressedMediaURL, 'public');
                Storage::disk('s3')->setVisibility($thumbnailMediaURL, 'public');
                $width = Image::make($file)->width();
                $height = Image::make($file)->height();
                $media = Media::where('id' , "=", $mediaId)->first();
                if ($media != null){
                    // update the media
                    $media->media_owner_id = $userId;
                    $media->parent_folder_id = $parentFolderId;
                    $media->name = $fileName;
                    $media->type = 'image';
                    $media->size = $fileSize;
                    $media->mime = $mime;
                    $media->thumbnail_media_path = $thumbnailMediaURL;
                    $media->compressed_media_path = $compressedMediaURL;
                    $media->width = $width;
                    $media->height = $height;
                    $media->system_media_name = $imageSystemName;
                    $media->path = $imageCompressedPath . '/' . $imageSystemName;
                    $media->media_aws_s3_url = $compressedMediaURL;
                    // update media information in the database
                    $media->save();
                }

                



                // $media = Media::create([
                //     'media_owner_id' => $userId,
                //     'parent_folder_id' => $parentFolderId,
                //     'name' => $file->getClientOriginalName(),
                //     'type' => 'image',
                //     'size' => $fileSize,
                //     'mime' => $mime,
                //     'thumbnail_media_path' => $thumbnailMediaURL,
                //     'compressed_media_path' => $compressedMediaURL,
                //     'width' => $width,
                //     'height' => $height,
                //     'system_media_name' => $this->createFilename($file),
                //     'path' => $compressedMediaURL,
                //     'media_aws_s3_url' => $compressedMediaURL,

                // ]);

            }
            //get the percentage of the upload

            // delete the file chunks
            unlink($file->getPathname());
            // delete the file from the storage folder




        }
    }
    function isVideo($file)
    {
        $videoExtensions = ['mp4'];
        $extension = $file->getClientOriginalExtension();
        if (in_array($extension, $videoExtensions)) {
            return true;
        }
        return false;
    }

    protected function createFilename(UploadedFile $file, $fileExtension = null)
    {
        $fileExtension = $fileExtension ?? $file->getClientOriginalExtension();
        return md5(time() . $file->getClientOriginalName()) . "." . $fileExtension;
    }
}