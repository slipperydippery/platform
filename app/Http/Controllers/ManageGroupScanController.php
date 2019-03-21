<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Group;
use Illuminate\Http\Request;

class ManageGroupScanController extends Controller
{
    public function promoteuser(Request $request)
    {
    	$scan = Scan::find($request->scan_id);
    	$group = Group::find($request->group_id);
    	$group->scan()->associate($scan);
    	$group->user()->associate($scan->user);
    	$group->save();
    	return redirect()->back();
    }
}
