<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ScreenCounter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function createNewAd($screen_id, $from, $to)
    {
        $begin = new DateTime($from);
        $end   = new DateTime($to);


        for ($i = $begin; $i <= $end; $i->modify('+1 day')) {
            $data = self::updateOrCreate(
                ['date' => $i->format("Y-m-d"), 'screen_id' => $screen_id],
                ['ads_counter' => DB::raw('ads_counter + 1')],
            );
            }

        return $data;
    }

    public static function isAvailable($screen_id, $from, $to)
    {
        $ads = Screen::find($screen_id)->adsCounter()->whereBetween('date', [$from, $to])->where('ads_counter', '>=', 10)->get();

        error_log($to);
        return $ads->count() == 0;
    }

    public static function getAllTransactions($screen_id)
    {
        return self::whereScreenId($screen_id)->where('date', '<', date('Y-m-d'))->sum('ads_counter');
    }

    public static function getUnwithdrawnTransactions($screen_id, $last_withdraw)
    {
        return self::whereScreenId($screen_id)->where('date', '<', date('Y-m-d'))->where('date', '>=', $last_withdraw)->sum('ads_counter');
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }
}
