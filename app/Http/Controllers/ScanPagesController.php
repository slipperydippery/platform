<?php

namespace App\Http\Controllers;

use App\Scan;
use Illuminate\Http\Request;
use App\Events\AlgemeenbeeldUpdated;

class ScanPagesController extends Controller
{
    /**
     * Enforce middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner');
        $this->middleware('unlocked', ['except' => 'start']);
    }

    public function start(Scan $scan)
    {
        if($scan->group && ! $scan->group->unlocked ) {
    		return view('scan.locked', compact('scan'));
        }
        return redirect()->route('scan.introductiefilm', compact('scan') );
    }

    public function introductiefilm(Scan $scan)
    {
        $next = '/sessie/' . $scan->id . '/regioincijfers';
        $previous = '/dashboard';
        if($scan->group) {
            $next = '/sessie/' . $scan->id . '/kennismaken';
        }

        return view('scan.introductiefilm', compact('scan', 'previous', 'next'));
    }

    public function kennismaken(Scan $scan)
    {
        $previous = '/sessie/' . $scan->id . '/introductiefilm';
        $next = '/sessie/' . $scan->id . '/regioincijfers';
    	return view('scan.kennismaken', compact('scan', 'previous', 'next'));
    }

    public function regioincijfers(Scan $scan)
    {
        $previous = '/sessie/' . $scan->id . '/introductiefilm';
        if($scan->group) {
            $previous = '/sessie/' . $scan->id . '/kennismaken';
        }
        $next = '/sessie/' . $scan->id . '/algemeenbeeld';
    	return view('scan.regioincijfers', compact('scan', 'previous', 'next'));
    }

    public function algemeenbeeld(Scan $scan)
    {
        $previous = '/sessie/' . $scan->id . '/regioincijfers';
        $next = '/sessie/' . $scan->id . '/algemeenbeeldresultaten';
        if( ! $scan->group) {
            $theme_id = $scan->scanmodel->themes->first()->id;
            $next = '/sessie/' . $scan->id . '/thema/' . $theme_id . '/introductie';
        }
    	return view('scan.algemeenbeeld', compact('scan', 'previous', 'next'));
    }

    public function algemeenbeeldresultaten(Scan $scan)
    {
        $previous = '/sessie/' . $scan->id . '/algemeenbeeld';
        $theme_id = $scan->scanmodel->themes->first()->id;
        $next = '/sessie/' . $scan->id . '/thema/' . $theme_id . '/introductie';

        $scanmodel = $scan->scanmodel->with('themes.questions')->first();
        if ($scan->group_id) {
            AlgemeenbeeldUpdated::dispatch($scan->group_id);
        }
    	return view('scan.algemeenbeeldresultaten', compact('scan', 'scanmodel', 'previous', 'next'));
    }

    public function results(Scan $scan)
    {
        return view('scan.results', compact('scan'));
    }
}