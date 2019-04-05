<?php

namespace App\Http\Controllers;

use App\Scan;
use App\District;
use App\Instantie;
use Illuminate\Http\Request;

class CreateComparisonController extends Controller
{
    public function districts(Scan $scan)
    {
        $districts = District::get();
        $session = session('createcomparison');
    	return view('createcomparison.districts', compact('scan', 'session', 'districts'));
    }

    public function storedistricts(Request $request, Scan $scan)
    {
        request()->validate([
            'districts' => 'required',
            'districts.*' => 'integer',
        ]);
        $request->session()->put('createcomparison.districts', $request->districts);

        return $request;

    }

    public function instantie(Scan $scan)
    {
        $instanties = Instantie::get();
        $instantie = Instantie::find(session('createcomparison.instantie_id'));
    	return view('createcomparison.instantie', compact('instanties', 'instantie', 'scan'));
    }

    public function storeinstantie(Request $request, Scan $scan)
    {
        request()->validate([
            'instantie_id' => 'required|integer',
        ]);
        $request->session()->put('createcomparison.instantie_id', $request->instantie_id);
        $request->session()->put('createcomparison.scanmodel_id', 1);

    	return redirect()->route('createcomparison.scans', $scan);
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
    	return view('createcomparison.scans', compact('scan', 'scans', 'session'));
    }

    public function storescans(Request $request, Scan $scan)
    {

        return $request;
    }
}
