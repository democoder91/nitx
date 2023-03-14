<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Jobs\ProccessFileJob;
use App\Models\Media;
use Carbon\Carbon;
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

    // a method to uplad file chunks and append them to a file called uploadMedia
    public function uploadMedia(Request $request, $parentFolderId=null)
    {
        set_time_limit(120);
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
        //if parent folder id is null , set it to request parent folder id
        if($parentFolderId == null && $request->parent_folder_id != null){
            $parentFolderId = $request->parent_folder_id;
        }

        if (!$receiver->isUploaded()) {
            throw new UploadMissingFileException();
        }

        // save the file with chunks
        $save = $receiver->receive();

        if ($save->isFinished()) {
            // dispathch the proccess file job
            // get the file
            $file = $save->getFile();
            $mime = str_replace('/', '-', $file->getMimeType());
            $fileSize = $file->getSize();
            //save the file to the local storage
            Storage::disk('public')->putFileAs('local', $file, $file->getClientOriginalName());
            //get the file path in the storage folder
            $filePath = Storage::disk('public')->path('local/' . $file->getClientOriginalName());
            // dd("file path: " . $filePath . " parent folder id: " . $parentFolderId . " file size: " . $fileSize . " mime: " . $mime);
            $fileName = $file->getClientOriginalName();
            $userId = auth()->user()->id;

            //create temp media record
            $media = new Media();
            $media->media_owner_id = $userId;
                    $media->parent_folder_id = $parentFolderId;
                    $media->name = $file->getClientOriginalName();
                    $media->type = 'image';
                    $media->mime = $mime;
                    $media->status = Status::NotReady->value;
                    $media->save();
            $media->save();
            $this->dispatch((new ProccessFileJob(
                $filePath, 
                $parentFolderId, 
                $fileSize, 
                $mime, 
                $fileName, 
                $userId,
                $media->id
            ))->delay(0));
    }
    $percentage = $save->handler()->getPercentageDone();
    return response()->json(['done' => $percentage]);
    
    }

    // a function to check if the file is a video or an image
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

    // a method to create a media
    // go to the create media migration and see the fields and create the method accordingly
}