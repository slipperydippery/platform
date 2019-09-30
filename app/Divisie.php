<?php

namespace App;

use App\Group;
use App\Instantie;
use App\Netwerkpartner;
use Illuminate\Database\Eloquent\Model;

class Divisie extends Model
{
    protected $guarded = [];

    public function instanties()
    {
    	return $this->belongsTo(Instantie::class);
    }

    public function netwerkpartners()
    {
    	return $this->hasMany(Netwerkpartner::class);
    }

    public function group()
    {
    	return $this->hasManyThrough(Group::class, Netwerkpartner::class);
    }
}
