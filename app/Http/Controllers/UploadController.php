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

    // a method to uplad file chunks and append them to a file called uploadMedia
    public function uploadMedia(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            throw new UploadMissingFileException();
        }

        // save the file with chunks
        $save = $receiver->receive();

        if ($save->isFinished()) {
            // get the file
            $file = $save->getFile();
            // save the file to s3
            // the file path variable is the user id then the date then the file name
            $filePath = $request->user()->id . '/' . date('Y-m-d') . '/' . $file->getClientOriginalName();
            $path = Storage::disk('public')->putFileAs($filePath, $file, $file->getClientOriginalName());

            




            

        }

        //get the percentage of the upload
        $percentage = $save->handler()->getPercentageDone();

        return response()->json(['done' => $percentage]);
    }
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