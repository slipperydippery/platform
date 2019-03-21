<?php

namespace App\Http\Controllers;

use App\Scan;
use Illuminate\Http\Request;

class ScanPagesController extends Controller
{
    public function start(Scan $scan)
    {
        return redirect()->route('scan.introductiefilm', compact('scan') );
    	return view('scan.start', compact('scan'));
    }

    public function introductiefilm(Scan $scan)
    {
        return view('scan.introductiefilm', compact('scan'));
    }

    public function kennismaken(Scan $scan)
    {
    	return view('scan.kennismaken', compact('scan'));
    }

    public function regioincijfers(Scan $scan)
    {
    	return view('scan.regioincijfers', compact('scan'));
    }

    public function algemeenbeeld(Scan $scan)
    {
    	return view('scan.algemeenbeeld', compact('scan'));
    }

    public function algemeenbeeldresultaten(Scan $scan)
    {
    	return view('scan.algemeenbeeldresultaten', compact('scan'));
    }
}
