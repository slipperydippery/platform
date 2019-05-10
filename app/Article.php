<?php

namespace App;

use App\Theme;
use App\Question;
use App\Articletype;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $guarded = [];

    public function themes()
    {
    	return $this->belongsToMany(Theme::class);
    }

    public function articletypes()
    {
    	return $this->belongsToMany(Articletype::class);
    }

    public function questions()
    {
    	return $this->belongsToMany(Question::class);
    }
}
