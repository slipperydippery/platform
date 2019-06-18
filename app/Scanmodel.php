<?php

namespace App;

use App\Theme;
use App\Articletype;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Scanmodel extends Model
{
    public function themes()
    {
    	return $this->hasMany(Theme::class);
    }

    public function questions()
    {
        $questions = new Collection();
        foreach ($this->themes as $theme) {
            foreach ($theme->questions as $question) {
                $questions->push($question);
            }
        }

        return $questions;
    }

    public function questioncount()
    {	
    	$questioncounter = 0;
    	foreach ($this->themes as $thistheme) {
    		$questioncounter += $thistheme->questions->count();
    	}
    	return $questioncounter;
    }

    public function instanties()
    {
    	return $this->hasMany(Instantie::class);
    }

    public function articletypes()
    {
        return $this->hasMany(Articletype::class);
    }

    public function articles()
    {
        $articles = new Collection();
        foreach ($this->articletypes as $articletype) {
            foreach ($articletype->articles as $article) {
                $articles->push($article);
            }
        }
        return $articles;
    }
}
