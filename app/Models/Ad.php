<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function Screens()
    {
        return $this->belongsToMany(Screen::class)->withPivot('status', 'from', 'to');
    }

    public function Advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }

    public function Categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function InReviewAds()
    {
        return $this->belongsToMany(Screen::class)->withPivot('status')->wherePivot('status', 'InReview');
    }

    public function sequence()
    {
        return $this->belongsTo(Sequence::class);
    }
}
