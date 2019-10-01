<?php

namespace App;

use App\Divisie;
use App\Netwerkanalyse;
use Illuminate\Database\Eloquent\Model;

class Netwerkpartner extends Model
{
    protected $guarded = [];

    public function divisies()
    {
        return $this->hasMany(Divisie::class);
    }

    public function netwerkanalyses()
    {
        return $this->hasMany(Netwerkanalyse::class);
    }
}
