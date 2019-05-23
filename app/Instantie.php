<?php

namespace App;

use App\Scan;
use Illuminate\Database\Eloquent\Model;

class Instantie extends Model
{
    public function scans()
    {
    	return $this->hasMany(Scan::class);
    }
}
