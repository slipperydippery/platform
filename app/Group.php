<?php

namespace App;

use App\Scan;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;

class Group extends Model
{
    use GeneratesUuid;
	protected $fillable = ['title', 'code', 'user_id', 'scan_id'];

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
    	$group = new Group([
    	    'title' => $scan->title,
    	    'code' => str_random(10),
    	    'scan_id' => $scan->id,
    	]);

    	auth()->user()->groups()->save($group);

    	$group->scans()->save($scan);
    	$group->scan()->associate($scan);

    	return $group;

    }

}
