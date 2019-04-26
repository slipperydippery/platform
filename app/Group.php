<?php

namespace App;

use App\Scan;
use App\User;
use App\Followup;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;

class Group extends Model
{
    use GeneratesUuid;
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
