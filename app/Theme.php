<?php

namespace App;

use App\Article;
use App\Question;
use App\Scanmodel;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function questions()
    {
    	return $this->hasMany(Question::class)->orderBy('order');
    }

    public function scanmodel()
    {
    	return $this->belongsTo(Scanmodel::class);
    }

    public function articles()
    {
    	return $this->belongsToMany(Article::class);
    }
}
