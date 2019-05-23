<?php

namespace App;

use App\Scan;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function scans()
    {
    	return $this->belongsToMany(Scan::class);
    }
}
