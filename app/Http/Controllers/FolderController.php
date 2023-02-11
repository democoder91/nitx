<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Media;
use App\Models\MediaOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class FolderController extends Controller
{

    public static function getAllMedia($mediaOnwerId)
    {
        $medias = [];
        $mediaOnwer = MediaOwner::find($mediaOnwerId);
        $folders = $mediaOnwer->folders();
        $medias[] = Folder::getMedia(null, $mediaOnwerId);
        foreach ($folders as $folder) {
            $medias[] = $folder->getMedia($folder->id, $mediaOnwerId);
        }
        return $medias;
    }

    public static function renameFolder(Request $request, $folderId)
    {
        $folder = Folder::find($folderId);
        if (!$folder && $folderId) {
            return;
        }
        $validatedData = $request->validate([
            'folder_name' => ['required', 'max:255'],
        ]);
        $folder->update([
            'name' => $validatedData['folder_name'],
        ]);
        return redirect()->back()->with('message', 'Your folder has been renamed successfully.');
    }

    public static function moveFolder(Request $request, $folderId)
    {
        $folder = Folder::find($folderId);
        if ($folderId && !$folder) {
            return;
        }
        if ($folderId === $request['parent_folder_id']) {
            return redirect()->back()->withErrors('You cannot move a folder to itself.');
        }
        if ($request['parent_folder_id'] === "select") {
            return redirect()->back()->withErrors('Please select the folder you want to move to.');
        }
        foreach (Folder::getFolders($folderId, auth()->user()->id) as $folder) {
            $folderModel = Folder::find($folder->id);
            $folderModel->parent_folder = $request['parent_folder_id'];
            $folderModel->save();
        }
        $folder->parent_folder = $request['parent_folder_id'];
        $folder->save();
        return redirect()->back()->with('message', 'Your folder and its contents has been moved successfully.');
    }

    public static function deleteFolder(Request $request, $folderId)
    {
        if ('delete all' !== $request['confirm_delete']) {
            return redirect()->back()->withErrors('Your folder has not been deleted since you did not type "delete all" properly.');
        }
        $folder = Folder::find($folderId);
        if ($folderId && !$folder) {
            return;
        }
        $folder->delete();
        foreach (Folder::getFolders($folderId, auth()->user()->id) as $folder) {
            $folderModel = Folder::find($folder->id);
            $folderModel->delete();
        }
        foreach (Folder::getMedia($folderId, auth()->user()->id) as $media) {
            $mediaModel = Media::find($media->id);
            $mediaModel->delete();
        }
        return redirect()->back()->with('message', 'Your folder has been deleted successfully.');
    }

    public static function downloadFolder(Request $request, $folderId)
    {
        $folder = Folder::find($folderId);
        if (!$folder && $folderId) {
            return redirect()->back();
        }
        $zip = new ZipArchive();
        $fileName = $folder->name . '.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE)) {
            $medias = Folder::getMedia($folderId, auth()->user()->id);
            foreach ($medias as $key => $media) {
                $relativeName = basename('storage/' . $media->path);
                $zip->addFile(public_path('storage/' . $media->path), $relativeName);
            }
            $zip->close();
        }
        if (File::exists(public_path($fileName))) {
            return response()->download(public_path($fileName));
        }
        return redirect()->back()->withErrors('File does not containing media');
    }

    public function getFoldersByFolderId($folderId = null)
    {
        return Folder::getFolders($folderId, auth()->user()->id);
    }

    public function getMediaByFolderId($folderId = null)
    {
        return Media::getMedia($folderId, auth()->user()->id);
    }

    public function getFoldersPath($parentFolderId)
    {
        $foldersPath = array();
        if (!Folder::find($parentFolderId)) {
            return [];
        }
        $foldersPath[] = [intval($parentFolderId), Folder::find($parentFolderId)->name];
        $flag = true;
        $parentFolderId2 = $parentFolderId;
        while ($flag) {
            if (is_null(Folder::getParentFolder($parentFolderId2))) {
                $flag = false;
            } else {
                if (!is_null(Folder::find(Folder::getParentFolder($parentFolderId2)->parent_folder))) {
                    $foldersPath[] = [Folder::find(Folder::getParentFolder($parentFolderId2)->parent_folder)->id, Folder::find(Folder::getParentFolder($parentFolderId2)->parent_folder)->name];
                }
                $parentFolderId2 = Folder::getParentFolder($parentFolderId2)->parent_folder;
            }
        }
        return array_reverse($foldersPath);
    }


    public function getParentFolderId($childId)
    {
        return response()->json(
            [
                'data' => Folder::getParentFolderId($childId)
            ]
        );
    }

    public function getMainFolderContent()
    {
        return response()->json([
            'folders' => Folder::getFolders(null, auth()->user()->id),
            'medias' => Folder::getMedia(null, auth()->user()->id)
        ]);
    }

}
