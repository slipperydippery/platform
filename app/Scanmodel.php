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
}
