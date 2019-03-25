<?php

namespace App;

use App\Scan;
use App\Question;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $guarded = [];

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function scan()
    {
    	return $this->belongsTo(Scan::class);
    }

    public function frontrunner()
    {
    	return $this->hasOne(Scan::class, 'id', 'frontrunner_id');
    }
}
