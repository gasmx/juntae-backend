<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = ['id'];

    public function cards()
    {
        return $this->hasMany(ActivityCard::class);
    }

    public function comments()
    {
        return $this->hasMany(ActivityComment::class);
    }
}
