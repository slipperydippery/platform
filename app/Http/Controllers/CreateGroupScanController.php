<?php

namespace App\Http\Controllers;

use Auth;
use App\Scan;
use App\Group;
use App\District;
use App\Followup;
use App\Instantie;
use Illuminate\Http\Request;

class CreateGroupScanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function title()
    {
    	return view('creategroupscan.title');
    }

    public function storetitle(Request $request)
    {
        request()->validate([
            'title' => 'required|min:3|max:255',
        ]);
        $request->session()->put('creategroupscan.title', $request->title);
    	return redirect()->route('creategroupscan.districts');

    }

    public function districts()
    {
        $districts = District::get();
        $session = session('creategroupscan');

    	return view('creategroupscan.districts', compact('districts', 'session'));
    }

    public function storedistricts(Request $request)
    {
        request()->validate([
            'districts' => 'required',
            'districts.*' => 'integer',
        ]);
        $request->session()->put('creategroupscan.districts', $request->districts);


    	return redirect()->route('creategroupscan.instantie');
    }

    public function instantie()
    {
        $instanties = Instantie::get();
        $instantie = Instantie::find(session('creategroupscan.instantie_id'));
    	return view('creategroupscan.instantie', compact('instanties', 'instantie'));
    }

    public function storeinstantie(Request $request)
    {
        request()->validate([
            'instantie_id' => 'required|integer',
        ]);
        $request->session()->put('creategroupscan.instantie_id', $request->instantie_id);
        $request->session()->put('creategroupscan.scanmodel_id', 1);

    	return redirect()->route('creategroupscan.datetime');
    }

    public function datetime()
    {
    	return view('creategroupscan.datetime');
    }

    public function storedatetime(Request $request)
    {
        if($missing = $this->sessionIsIncomplete()){
            return redirect()->route($missing);
        }

        $request->session()->put('creategroupscan.isgroup', false);
    	
        $scan = Scan::register(session('creategroupscan'));

        $group = Group::register( $scan );
        $group->datetime = $request->datetime;
        $group->save();
        $request->session()->forget('creategroupscan');
        $group->followup()->save(new Followup);

    	return redirect()->route('creategroupscan.created', $scan);
    }

    public function created(Scan $scan)
    {
    	$group = $scan->group;
        return view('creategroupscan.created', compact('scan', 'group'));
    }

    public function sessionIsIncomplete()
    {
        if (! session('creategroupscan.title')) {
            return 'creategroupscan.title';
        } else if (! session('creategroupscan.districts')) {
            return 'creategroupscan.districts';
        } else if (! session('creategroupscan.instantie_id')) {
            return 'creategroupscan.instantie';
        } 
        return false;
    }
}
