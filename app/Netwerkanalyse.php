<?php

namespace App;

use App\User;
use App\Divisie;
use App\Netwerkpartner;
use Illuminate\Database\Eloquent\Model;

class Netwerkanalyse extends Model
{
	protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function netwerkpartners()
    {
        return $this->hasMany(Netwerkpartner::class);
    }

    public function setUserAttribute($user)
    {
        $this->attributes['user_id'] = $user->getKey();
    }

    public static function register($attributes)
    {
        $netwerkanalyse = Netwerkanalyse::create([
            'title' => $attributes['title'],
            'user_id' => $attributes['user_id'],
        ]);

        Divisie::generateNetwerkpartners($netwerkanalyse);

        return $netwerkanalyse;
    }

}
