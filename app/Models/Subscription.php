<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    public function plan()
    {
        return $this->hasOne(Plan::class);
    }

    public static function getSubscription($mediaOwnerId)
    {
        return DB::table('subscriptions')
            ->select('id')
            ->where('media_owner_id', $mediaOwnerId)
            ->first();
    }

    public static function checkIfHasPlanSubscription($mediaOwnerId)
    {
        return DB::table('subscriptions')
            ->where('media_owner_id', $mediaOwnerId)
            ->first();
    }

    public static function getSubscriptionDate($subscriptionId)
    {
        return DB::table('subscriptions')
            ->join('plans', 'subscriptions.plan_id', '=', 'plans.id')
            ->where('subscriptions.id', $subscriptionId)
            ->first();
    }

    protected $guarded = [];
}
