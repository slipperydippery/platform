<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Articletype extends Model
{
    protected $guarded = [];

    public function articles()
    {
    	return $this->belongsToMany(Article::class);
    }
}
