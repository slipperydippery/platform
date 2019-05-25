<?php

namespace App\Http\Controllers;

use Auth;
use App\Scan;
use App\Group;
use App\Instantie;
use App\Events\GroupUpdated;
use Illuminate\Http\Request;
use App\Events\SessionAddedToGroup;

class JoinGroupScanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function addscan(Group $group, $code)
    {
        foreach (Auth::user()->scans as $thisscan) {
            if ($thisscan->group && $thisscan->group->id === $group->id) {
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
        $event = 'sessionaddedtogroup';
        GroupUpdated::dispatch($group->id, $event, $scan->id);
        SessionAddedToGroup::dispatch($group->id, $scan->id);
    	return redirect()->route('joingroupscan.created', $scan);
    }

    public function created(Scan $scan)
    {
    	return view('joingroupscan.created', compact('scan'));
    }

    public function entercode()
    {
        return view('joingroupscan.entercode');
    }

    public function storecode(Request $request)
    {
        $code = strtoupper($request->code);
        if($group = Group::where('code', $code)->first()) {
            return redirect()->route('joingroupscan.addscan', [$group, $code]);
        }
        return redirect()->back()->withErrors(['code' => ['We hebben geen groep met deze code kunnen vinden']]);
        // return redirect()->route('dashboard');//////
    }
}
