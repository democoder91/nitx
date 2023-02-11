<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Screen extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function getEarning()
    {
        return ScreenCounter::getAllTransactions($this->id);
    }

    public static function getScreen($id)
    {
        return Screen::find($id);
    }

    public function MediaOwner()
    {
        return $this->belongsTo(MediaOwner::class);
    }

    public function Ads()
    {
        return $this->belongsToMany(Ad::class)->withPivot('status');
    }

    public function Categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function adsCounter()
    {
        return $this->hasMany(ScreenCounter::class);
    }

    public function InReviewAds()
    {
        return $this->belongsToMany(Ad::class)->withPivot('status')->wherePivot('status', 'InReview');
    }

    public function screenGroup()
    {
        return $this->belongsToMany(ScreenGroup::class);
    }

    public static function getRegularScreens($mediaOnwerId)
    {
        return DB::table('screens')->select('*')->where('type', '=', 'regular')->where('media_owner_id', '=', $mediaOnwerId)->get();
    }

    public static function getAdScreens($mediaOnwerId)
    {
        return DB::table('screens')->select('*')->where('type', '=', 'ad')->where('media_owner_id', '=', $mediaOnwerId)->get();
    }

    public static function getScreensNotInScreenGroup($mediaOnwerId, $screenGroupId)
    {
        return DB::table('screens')
            ->select('*')
            ->whereNotIn('id', DB::table('screen_screen_group')
                ->select('screen_id')
                ->where('screen_group_id', '=', $screenGroupId))
            ->where('media_owner_id', '=', $mediaOnwerId)
            ->where('deleted_at', '=', null)
            ->get();
    }

    public static function checkIsScreenActiveInAnotherScreenGroup()
    {
        $query = DB::table("screen_groups")
            ->join("screen_screen_group", function ($join) {
                $join->on("screen_groups.id", "=", "screen_screen_group.screen_group_id");
            })
            ->select("screen_groups.id", "count (screen_groups.id)")
            ->where("is_active", "=", true)
            ->groupBy("screen_groups")
            ->get();
        return $query;
    }

    public static function getScreenAds($screenId)
    {
        return DB::table('screens')
            ->join('ad_screen', 'screens.id', '=', 'ad_screen.screen_id')
            ->where('screen_id', '=', $screenId)
            ->get();
    }

    public static function checkIsScreenInOneGroup($screenId)
    {
        return DB::table('screens')
            ->where('id', '=', $screenId)
            ->select('active_screen_group_id')
            ->first();
    }

}
