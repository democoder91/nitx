<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ScreenGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function getScreenGroups()
    {
        return ScreenGroup::all();
    }

    public function mediaOwner()
    {
        return $this->belongsTo(MediaOwner::class);
    }

    public function screens()
    {
        return $this->belongsToMany(Screen::class);
    }

    public static function getAllScreensByScreenGroup($id)
    {
        return DB::table('screen_groups')
            ->join('screen_screen_group', 'screen_groups.id', '=', 'screen_screen_group.screen_group_id')
            ->join('screens', 'screen_screen_group.screen_id', '=', 'screens.id')
            ->where('screen_groups.id', '=', $id)
            ->where('screens.deleted_at', '=', null)
            ->get();
    }

    public function sequences()
    {
        return $this->hasMany(Sequence::class);
    }

    public static function getScreensNotInTheGroup($media_owner_id)
    {
        return DB::table('screens')->select('*')->whereNotExists(function ($query) {
            $query
                ->select('*')
                ->from('screen_screen_group')
                ->whereRaw('screens.id = screen_screen_group.screen_id');
        })
            ->where('screens.media_owner_id', '=', $media_owner_id)
            ->get();
    }


    public static function fetchScreenGroupSequenceMediaWithTheirDuration($sequenceId)
    {
        return DB::table("screen_groups")
            ->join("sequences", function ($join) {
                $join->on("screen_groups.sequence_id", "=", "sequences.id");
            })
            ->join("media_sequence", function ($join) {
                $join->on("sequences.id", "=", "media_sequence.sequence_id");
            })
            ->join("media", function ($join) {
                $join->on("media_sequence.media_id", "=", "media.id");
            })
            ->where('media_sequence.sequence_id', '=', $sequenceId)
            ->orderBy('order')
            ->get();
    }

    public static function fetchScreenMediaBySequenceId($sequenceId, $screenId)
    {
        return DB::table('screens')
            ->select('*')
            ->join('media_sequence', 'screens.sequence_id', '=', 'media_sequence.sequence_id')
            ->join('media', 'media_sequence.media_id', '=', 'media.id')
            ->where('screens.sequence_id', '=', $sequenceId)
            ->where('screens.id', '=', $screenId)
            ->orderBy('order')
            ->get();
    }

    public static function getScreenGroupsByMediaOwnerId($mediaOwnerId)
    {
        return DB::table('screen_groups')
            ->select('*')
            ->where('media_owner_id', '=', $mediaOwnerId)
            ->where("deleted_at", "=", null)
            ->get();
    }

}
