<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;


    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public static function getPlan($subscriptionId)
    {
        return self::find($subscriptionId);
    }

    protected $guarded = [];
}
