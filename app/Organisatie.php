<?php

namespace App;

use App\Group;
use App\Leefgebied;
use App\Scanmodel;
use App\Netwerkpartner;
use Illuminate\Database\Eloquent\Model;

class Organisatie extends Model
{
    protected $guarded = [];

    public function leefgebieds()
    {
    	return $this->belongsTo(Leefgebied::class);
    }

    public function netwerkpartners()
    {
    	return $this->hasMany(Netwerkpartner::class);
    }

    public static function generateNetwerkpartners($netwerkanalyse)
    {
        foreach(Leefgebied::get() as $leefgebied)
        {
            foreach($leefgebied->organisaties as $organisatie)
            {
                Netwerkpartner::create([
                    'netwerkanalyse_id' => $netwerkanalyse->id,
                    'organisatie_id' => $organisatie->id,
                ]);
            }

        }
    }
}
