<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Auth\Authenticatable;

class MediaOwner extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function getWallet()
    {
        $screens = $this->screens;
        $total_earning = 0;

        foreach ($screens as $screen) {
            $total_earning += ScreenCounter::getAllTransactions($screen->id);
        }

        return $total_earning;
    }

    public function getUnwithdrawnWallet()
    {
        $screens = $this->screens;
        $total_earning = 0;
        $withdraw = withdraw::whereMediaOwnerId($this->id)->get();

        foreach ($screens as $screen) {
            $total_earning += ScreenCounter::getUnwithdrawnTransactions($screen->id, $withdraw->last()->date);
        }

        return $total_earning;
    }

    public function screens()
    {
        return $this->hasMany(Screen::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function screenGroups()
    {
        return $this->hasMany(ScreenGroup::class);
    }


    public function folders()
    {
        return $this->hasMany(Folder::class)->get();
    }

    public function media()
    {
        return $this->hasMany(Media::class)->get();
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

}
