<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SequenceDay extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function sequences()
    {
        return $this->belongsToMany(Sequence::class);
    }
}
