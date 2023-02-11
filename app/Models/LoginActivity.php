<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class LoginActivity extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static function getLoginActivitiesByMediaOwnerId($mediaOwnerId)
    {
        return DB::table('login_activities')
            ->select('*')
            ->where('media_owner_id', $mediaOwnerId)
            ->get();
    }

    protected $guarded = [];
}
