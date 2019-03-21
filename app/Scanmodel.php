<?php

namespace App;

use App\Theme;
use Illuminate\Database\Eloquent\Model;

class Scanmodel extends Model
{
    public function themes()
    {
    	return $this->hasMany(Theme::class);
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
}
