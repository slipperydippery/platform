<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leefgebied extends Model
{

    public function organisaties()
    {
        return $this->hasMany(Organisatie::class);
    }
}
