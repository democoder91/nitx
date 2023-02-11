<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Sequence extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function screenGroup()
    {
        return $this->belongsTo(ScreenGroup::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function days()
    {
        return $this->belongsToMany(SequenceDay::class);
    }

    public function media()
    {
        return $this->belongsToMany(Media::class);
    }

    public static function getSequenceMedia($mediaOnwerId, $sequenceId)
    {
        return DB::table('media_sequence')
            ->join('media', 'media_sequence.media_id', '=', 'media.id')
            ->where('media_owner_id', '=', $mediaOnwerId)
            ->where('sequence_id', '=', $sequenceId)
            ->get();
    }

    public static function getSequences()
    {
        return DB::table('sequences')->select("*")
            ->where("deleted_at", "=", null)
            ->get();
    }

    public static function getSequenceMediaCount($sequenceId)
    {
        return DB::table('media_sequence')
            ->join('media', 'media_sequence.media_id', '=', 'media.id')
            ->where('sequence_id', '=', $sequenceId)
            ->count();
    }

    public static function getDays($sequenceId)
    {
        return DB::table('sequence_sequence_day')
            ->select('*')
            ->where('sequence_id', '=', $sequenceId)
            ->get();
    }

    public static function getMedia($sequenceId)
    {
        return DB::table('media_sequence')
            ->select('*')
            ->where('sequence_id', '=', $sequenceId)
            ->get();
    }

    public static function deleteDays($sequenceId)
    {
        return DB::table('sequence_sequence_day')
            ->select('*')
            ->where('sequence_id', '=', $sequenceId)
            ->delete();
    }

    public static function deleteMedia($sequenceId)
    {
        return DB::table('media_sequence')
            ->select('*')
            ->where('sequence_id', '=', $sequenceId)
            ->delete();
    }


    public static function getSequenceMediaInfo($sequenceId)
    {
        return DB::table('media')
            ->join('media_sequence', 'media.id', '=', 'media_sequence.media_id')
            ->where('sequence_id', '=', $sequenceId)
            ->orderBy('order')
            ->get();
    }

    public static function getAllSequences($mediaOnwerId)
    {
        $seq =  DB::table('sequences')
            ->select('*')
            ->where('media_owner_id', '=', $mediaOnwerId)
            ->orWhere('media_owner_id', '=', Null)
            ->where('deleted_at', '=', null)
            ->get();

            

        return $seq;
    }

    public static function getReadySequences()
    {
        return DB::table('sequences')
            ->select('*')
            ->where('status', '=', 'ready')
            ->get();
    }

    public static function getSequenceDays($sequenceId)
    {
        return DB::table('sequence_days')
            ->join('sequence_sequence_day', 'sequence_days.id', '=', 'sequence_sequence_day.sequence_day_id')
            ->where('sequence_id', '=', $sequenceId)
            ->get();
    }


    public static function getSequenceDaysNotInSequence($sequenceId)
    {
        return DB::table('sequence_days')
            ->select('*')
            ->whereNotIn('id', DB::table('sequence_sequence_day')
                ->select('sequence_sequence_day.sequence_day_id')
                ->where('sequence_id', '=', $sequenceId))
            ->get();
    }

    public static function getAllScreensBySequenceId($sequenceId)
    {
        return DB::table('screens')
            ->select('*')
            ->where('sequence_id', '=', $sequenceId)
            ->get();
    }

    public static function getAllSequencesByMediaOwnerId($mediaOwnerId)
    {
        return DB::table('sequences')
            ->select('*')
            ->where('media_owner_id', '=', $mediaOwnerId)
            ->where("deleted_at", "=", null)
            ->get();
    }

    public static function fetchDefaultSequence()
    {
        return DB::table('media')
            ->select('*')
            ->where('id', '=', 1)
            ->get();
    }


    public static function checkIfSequenceIsLinkedToScreenGroup($sequenceId)
    {
        return DB::table('sequences')
            ->join('screen_groups', 'sequences.id', '=', 'screen_groups.sequence_id')
            ->where('sequence_id', '=', $sequenceId)
            ->count();
    }

    public static function getScreensConnectedToThisSequence($sequenceId)
    {
        return DB::table('sequences')
            ->join('screens', 'sequences.id', '=', 'screens.sequence_id')
            ->where('sequence_id', '=', $sequenceId)
            ->get();
    }
}