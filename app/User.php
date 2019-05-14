<?php

namespace App;

use Cache;
use Auth;
use App\Role;
use App\Scan;
use App\Group;
use App\Dashmessage;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
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
