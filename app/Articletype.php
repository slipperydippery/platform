<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Articletype extends Model
{
    protected $guarded = [];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->order = $model->count() + 1;
        });
    }

    public function articles()
    {
    	return $this->belongsToMany(Article::class);
    }
}
