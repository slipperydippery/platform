<?php

namespace App\Http\Controllers;

use Auth;
use App\Scan;
use App\Group;
use App\Instantie;
use Illuminate\Http\Request;

class JoinGroupScanController extends Controller
{
    public function addscan(Group $group, $code)
    {
        foreach (Auth::user()->scans as $thisscan) {
            if ($thisscan->group->id === $group->id) {
                session()->flash('status', 'Je doet al mee aan deze scan');
                return redirect()->route('scan.start', $thisscan);
            }
        }
        $instanties = Instantie::get();
        return view('creategroupscan.addscan', compact('instanties', 'group', 'code'));
    }

    public function storescan(Request $request, Group $group, $code)
    {
    	$attributes = $request->all();
    	$attributes['isgroup'] = true;
    	$attributes['group_id'] = $group->id;
    	$attributes['scanmodel_id'] = $group->scan->scanmodel->id;
    	$scan = Scan::register($attributes);
    	return redirect()->route('joingroupscan.created', $scan);
    }

    public function created(Scan $scan)
    {
    	return view('joingroupscan.created', compact('scan'));
    }
}