<?php

namespace App;

use App\Scan;
use App\User;
use App\Divisie;
use App\Followup;
use App\Netwerkanalyse;
use App\Netwerkpartner;
use App\Events\GroupUpdated;
use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;

class Group extends Model
{
    use UsesUuid;
    
	protected $fillable = ['title', 'code', 'user_id', 'scan_id', 'unlocked'];

    public function scan()
    {
    	return $this->belongsTo(Scan::class);
    }

    public function scans()
    {
    	return $this->hasMany(Scan::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function followup()
    {
        return $this->hasOne(Followup::class);
    }

    public function usercount()
    {
    	return $this->scans->count();
    }

    public function netwerkpartners()
    {
        return $this->hasMany(Netwerkpartner::class);
    }

    public function divisies()
    {
        return $this->hasManyTrough(Divisie::class, Netwerkpartner::class);
    }

    public function netwerkanalyse()
    {
        return $this->hasOne(Netwerkanalyse::class);
    }

    public function authhasscan()
    {
    	$hasscan = false;
    	foreach ($this->scans as $scan) {
    		if($scan->user->id == auth()->user()->id){
    			$hasscan = true;
    		}
    	}
    	return $hasscan;
    }

    public static function register(Scan $scan)
    {
        $unique = Group::generateUniqueCode();
    	$group = new Group([
    	    'title' => $scan->title,
    	    'code' => $unique,
    	    'scan_id' => $scan->id,
    	]);

    	auth()->user()->groups()->save($group);

    	$group->scans()->save($scan);
    	$group->scan()->associate($scan);

    	return $group;
    }

    public function amend($attributes)
    {
        if (gettype($attributes == 'object')) {
            $attributes = (array) $attributes;
        }

        $this->title            = $attributes['title'];
        $this->scan_id          = $attributes['scan_id'];
        $this->datetime         = $attributes['datetime'];
        $this->unlocked         = $attributes['unlocked'];

        $this->save();
        $this->mirrorToChildren();
        
        return $this;
    }

    public function mirrorScanToGroup($scan)
    {
        $this->title            = $scan->title;
        $this->mirrorToChildren();
    }

    public function mirrorToChildren()
    {
        foreach ($this->scans as $scan) {
            $scan->title = $this->title;
            $scan->description = $this->scan->description;
            $scan->save();
        }
        GroupUpdated::dispatch($scan->group->id, 'groupinfoupdated');
        return $this;
    }

    public static function generateUniqueCode()
    {
        $unique = false;
        while ($unique == false) {
            $testcode = strtoupper(str_random(4));
            $unique = Group::where('code', $testcode)->get()->count() == 0 ? $testcode : false;
        }
        return $unique;
    }

}
