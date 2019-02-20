<?php

namespace App;

use App\Question;
use App\Scanmodel;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function questions()
    {
    	return $this->hasMany(Question::class);
    }

    public function scanmodel()
    {
    	return $this->belongsTo(Scanmodel::class);
    }
}
