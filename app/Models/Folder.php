<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Folder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function mediaOwner()
    {
        return $this->hasOne(MediaOwner::class);
    }

    public static function getParentFolder($folderId)
    {
        return DB::table('folders')
            ->select('parent_folder')
            ->where('id', '=', $folderId)->first();
    }

    public static function getMedia($parentFolderId = null, $mediaOwnerId)
    {
        return DB::table('media')->select('*')
            ->where('parent_folder_id', '=', $parentFolderId)
            ->where('media_owner_id', '=', $mediaOwnerId)
            ->where('deleted_at', '=', null)
            // where status is Ready
            ->where('status', '=', Status::Ready->value)
            
            ->get();
    }

    public static function getFolders($parentFolderId = null, $mediaOwnerId)
    {
        return DB::table('folders')->select('*')
            ->where('parent_folder', '=', $parentFolderId)
            ->where('media_owner_id', '=', $mediaOwnerId)
            ->where('deleted_at', '=', null)
            ->get();
    }


    public static function getAllFolders($mediaOwnerId)
    {
        return DB::table('folders')->select('*')
            ->where('media_owner_id', '=', $mediaOwnerId)
            ->where('deleted_at', '=', null)
            ->get();
    }

    public static function getParentFolderId($childId)
    {
        return DB::table('folders')->select('parent_folder')
            ->where('id', '=', $childId)
            ->get();
    }

}
