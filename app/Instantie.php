<?php

namespace App;

use App\Scan;
use App\Divisie;
use Illuminate\Database\Eloquent\Model;

class Instantie extends Model
{
	protected $guarded = [];

    public function scans()
    {
    	return $this->hasMany(Scan::class);
    }

    public function divisies()
    {
    	return $this->hasMany(Divisie::class);
    }
}
