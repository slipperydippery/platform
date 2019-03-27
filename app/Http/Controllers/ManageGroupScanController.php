<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Group;
use Illuminate\Http\Request;

class ManageGroupScanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('manager');
    }

    public function promoteuser(Request $request, Group $group)
    {
    	$scan = Scan::find($request->scan_id);
    	$group = Group::find($request->group_id);
    	$group->scan()->associate($scan);
    	$group->user()->associate($scan->user);
    	$group->save();
    	return redirect()->back();
    }

    public function unlock(Group $group)
    {
    	$group->unlocked = true;
    	$group->save();
    	return redirect()->back();
    }
}
