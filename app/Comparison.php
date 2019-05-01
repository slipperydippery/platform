<?php

namespace App;

use App\Scan;
use App\District;
use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    protected $fillable = ['title', 'scan_id', 'scanmodel_id', 'instantie_id'];

    public function districts()
    {
    	return $this->belongsToMany(District::class);
    }

    public function scan()
    {
    	return $this->belongsTo(Scan::class);
    }

    public function scans()
    {
    	return $this->belongsToMany(Scan::class);
    }
}
