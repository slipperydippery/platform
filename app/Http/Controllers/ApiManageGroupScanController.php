<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Group;
use Illuminate\Http\Request;
use App\Events\GroupAdminUpdated;

class ApiManageGroupScanController extends Controller
{
    public function promoteuser(Request $request, Group $group)
    {
    	$thisgroup = Group::find($group->id);
    	// return $thisgroup->user;
    	$scan = Scan::find($request->scan['id']);
    	$thisgroup->scan()->associate($scan);
    	$thisgroup->user()->associate($scan->user);
    	$thisgroup->save();
    	GroupAdminUpdated::dispatch($group->id);
    	return $thisgroup;
    }
}
