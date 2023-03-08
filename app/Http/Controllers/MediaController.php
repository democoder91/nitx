<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\MediaOwner;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Photo\Http\Requests\Photos\Download;

class MediaController extends Controller
{


    public static function getMediaOwnerMediaSize($mediaOnwerId)
    {
        $mediaOnwer = MediaOwner::find($mediaOnwerId);
        $mediaSize = $mediaOnwer->media()->sum('size');
        if ($mediaSize >= pow(10, 9)) {
            return [
                'media_size' => round($mediaOnwer->media()->sum('size') * (1.0 * pow(10, -9)), 2),
                'unit' => 'GB'
            ];
        } else {
            return [
                'media_size' => round($mediaOnwer->media()->sum('size') * (1.0 * pow(10, -6)), 2),
                'unit' => 'MB'
            ];
        }
    }

    public static function deleteMedia(Request $request, $mediaId)
    {
        if ('delete' != $request['confirm_delete']) {
            return redirect()->back()->withErrors('Your media has not been deleted successfully');
        }
        $media = Media::find($mediaId);
        if ($media) {
            $media->delete();
            return redirect()->back()->with('message', 'Your media has been deleted successfully');
        }
        
    }

    public static function renameMedia(Request $request, $mediaId)
    {
        $media = Media::find($mediaId);
        if (!$media && $mediaId) {
            return;
        }
        $validatedData = $request->validate([
            'media_name' => ['required', 'max:255'],
        ]);
        $media->update([
            'name' => $validatedData['media_name'],
        ]);
        return redirect()->back()->with('message', 'Your media name has been renamed successfully.');
    }

    public static function downloadMedia(Request $request, $mediaId)
    {
        $media = Media::find($mediaId);
        if (!$media && $mediaId) {
            return;
        }
        if ($media->type == "image") {
            $imagePath = $media->compressed_media_path;
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=" . basename($imagePath));
            header("Content-Type: " . $media->mime);
            return readfile($imagePath);
        } else if ($media->type == "video") {
            $videoPath = $media->video_path;
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=" . basename($videoPath));
            header("Content-Type: " . $media->mime);
            return readfile($videoPath);
        }
    }

    public static function moveMedia(Request $request, $mediaId)
    {
        $media = Media::find($mediaId);
        if (!$media && $mediaId) {
            return;
        }
        if ($request['parent_folder_id'] == "null") {
            $media->update([
                'parent_folder_id' => null
            ]);
        } else {
            $media->update([
                'parent_folder_id' => $request['parent_folder_id']
            ]);
        }
        return redirect()->back()->with('message', 'Your media has been moved successfully.');
    }

}
