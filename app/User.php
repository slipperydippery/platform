<?php

namespace App;

use Auth;
use Cache;
use App\Role;
use App\Scan;
use App\Group;
use App\Dashmessage;
use App\Netwerkanalyse;
use App\Models\Concerns\UsesUuid;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use UsesUuid;
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'sharepermission', 'terms'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scans()
    {
        return $this->hasMany(Scan::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function netwerkanalyses()
    {
        return $this->hasMany(Netwerkanalyse::class);
    }

    public function dashmessages()
    {
        return $this->morphMany(Dashmessage::class, 'dashmessagable');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
