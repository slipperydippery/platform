<?php

namespace App\Http\Controllers;

use App\Scan;
use App\District;
use App\Instantie;
use Illuminate\Http\Request;

class CreateComparisonController extends Controller
{
    /**
     * Enforce middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner');
    }
    
    public function districts(Scan $scan)
    {
        $districts = District::get();
        $session = session('createcomparison');
    	return view('createcomparison.districts', compact('scan', 'session', 'districts'));
    }

    public function storedistricts(Request $request, Scan $scan)
    {
        request()->validate([
            'districts.*' => 'integer',
        ]);
        $request->session()->put('createcomparison.districts', $request->districts);

        return $request;

    }

    public function instantie(Scan $scan)
    {
        $instanties = Instantie::get();
        $instantie = Instantie::find(session('createcomparison.instantie_id'));
        $session = session('createcomparison');
    	return view('createcomparison.instantie', compact('instanties', 'instantie', 'scan', 'session'));
    }

    public function storeinstantie(Request $request, Scan $scan)
    {
        $request->session()->put('createcomparison.instanties', $request->instanties);
        return $request->all();
    }

    public function scans(Scan $scan)
    {
        $scans = [];
        foreach (Scan::where('instantie_id', session('createcomparison.instantie_id'))->get() as $thisscan) {
            foreach( $thisscan->districts as $thisdistrict ) {
                if( in_array($thisdistrict->id, session('createcomparison.districts')) ) {
                    $scans[] = $thisscan;
                }
            }
        }
        $session = session('createcomparison');
        $districts = District::get();
        $instanties = Instantie::get();
        $scan = Scan::with('user', 'answers', 'instantie', 'districts')->find($scan->id);
    	return view('createcomparison.scans', compact('scan', 'scans', 'session', 'districts', 'instanties'));
    }

    public function storescans(Request $request, Scan $scan)
    {

        return $request;
    }
}
