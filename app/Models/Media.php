<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Media extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];


    public function mediaOwner()
    {
        return $this->hasOne(MediaOwner::class);
    }


    public static function getMedia($parentFolderId = null, $mediaOwnerId)
    {
        return DB::table('media')->select('*')
            ->where('parent_folder_id', '=', $parentFolderId)
            ->where('media_owner_id', '=', $mediaOwnerId)
            ->where('deleted_at', '=', null)
            ->get();
    }

    public static function getMediaByName($mediaName)
    {
        return DB::table('media')->select('*')->where('name', '=', $mediaName);
    }

    public function sequences()
    {
        return $this->belongsToMany(Sequence::class);
    }


}
