<?php

use App\Scan;
use App\Group;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
}); 

Broadcast::channel('dashmessages.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('algemeenbeeld.{group}', function($user, Group $group) {
	$canAccess = false;
	foreach($group->scans as $thisscan) {
	    if( (int) $thisscan->user->id === (int) $user->id) {
	        $canAccess = true;
	    }
	}
	return $canAccess;
});

Broadcast::channel('groupscores.{group}', function($user, Group $group) {
	$canAccess = false;
	foreach($group->scans as $thisscan) {
	    if( (int) $thisscan->user->id === (int) $user->id) {
	        $canAccess = true;
	    }
	}
	return $canAccess;
});

Broadcast::channel('sessionsadded.{group}', function($user, Group $group) {
	$canAccess = false;
	foreach($group->scans as $thisscan) {
	    if( (int) $thisscan->user->id === (int) $user->id) {
	        $canAccess = true;
	    }
	}
	return $canAccess;
});
