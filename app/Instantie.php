<?php

namespace App;

use App\Scan;
use Illuminate\Database\Eloquent\Model;

class Instantie extends Model
{
	protected $guarded = [];

    public function scans()
    {
    	return $this->hasMany(Scan::class);
    }
}
