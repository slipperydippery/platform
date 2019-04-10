<?php

namespace App\Http\Controllers;

use App\Scan;
use App\District;
use App\Instantie;
use Illuminate\Http\Request;

class CreateSingleScanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function title()
    {
    	return view('createsinglescan.title');
    }

    public function storetitle(Request $request)
    {
        request()->validate([
            'title' => 'required|min:3|max:255',
        ]);
        $request->session()->put('createsinglescan.title', $request->title);
    	return redirect()->route('createsinglescan.districts');
    }

    public function districts()
    {
        $districts = District::get();
        $session = session('createsinglescan');
        return view('createsinglescan.districts', compact('districts', 'session'));
    }

    public function storedistricts(Request $request)
    {
        request()->validate([
                'districts' => 'required',
                'districts.*' => 'integer'
        ]);
        $request->session()->put('createsinglescan.districts', $request->districts);

        return redirect()->route('createsinglescan.instantie');

    }

    public function instantie()
    {
        $instanties = Instantie::get();
    	return view('createsinglescan.instantie', compact('instanties'));
    }

    public function storeinstantie(Request $request)
    {
    	request()->validate([
    		'instantie_id' => 'required|integer',
    	]);
        $request->session()->put('createsinglescan.instantie_id', $request->instantie_id);
        $request->session()->put('createsinglescan.isgroup', false);
        $request->session()->put('createsinglescan.scanmodel_id', 1);

        $scan = Scan::register(session()->get('createsinglescan'));

        $request->session()->forget('createsinglescan');
    	return redirect()->route('createsinglescan.created', $scan);
    }

    public function created(Scan $scan)
    {
    	session()->forget('createsinglescan');
    	return view('createsinglescan.created', compact('scan'));
    }

    public function sessionIsIncomplete()
    {
        return false;
    }
}
