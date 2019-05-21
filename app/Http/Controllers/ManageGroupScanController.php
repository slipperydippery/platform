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

    public function unlock(Group $group)
    {
    	$group->unlocked = true;
    	$group->save();
    	return redirect()->back();
    }
}
