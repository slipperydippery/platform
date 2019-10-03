<?php

namespace App;

use App\Organisatie;
use App\Netwerkanalyse;
use Illuminate\Database\Eloquent\Model;

class Netwerkpartner extends Model
{
    protected $guarded = [];

    public function organisatie()
    {
        return $this->belongsTo(Organisatie::class);
    }

    public function netwerkanalyses()
    {
        return $this->belongsTo(Netwerkanalyse::class);
    }
}
