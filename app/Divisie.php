<?php

namespace App;

use App\Group;
use App\Instantie;
use App\Scanmodel;
use App\Netwerkpartner;
use Illuminate\Database\Eloquent\Model;

class Divisie extends Model
{
    protected $guarded = [];

    public function instanties()
    {
    	return $this->belongsTo(Instantie::class);
    }

    public function netwerkpartners()
    {
    	return $this->hasMany(Netwerkpartner::class);
    }

    public static function generateNetwerkpartners($netwerkanalyse)
    {
        foreach(Scanmodel::find(1)->instanties as $instantie)
        {
            foreach($instantie->divisies as $divisie)
            {
                Netwerkpartner::create([
                    'netwerkanalyse_id' => $netwerkanalyse->id,
                    'divisie_id' => $divisie->id,
                ]);
            }

        }
    }
}
