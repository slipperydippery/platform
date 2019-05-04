<?php

namespace App;

use App\Theme;
use App\Articletype;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $guarded = [];

    public function themes()
    {
    	return $this->belongsToMany(Theme::class);
    }

    public function articletype()
    {
    	return $this->belongsTo(Articletype::class);
    }
}
