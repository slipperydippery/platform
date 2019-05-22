<?php

namespace App\Http\Controllers;

use Auth;
use App\Scan;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['dashboard']]);
        $this->middleware('verified', ['except' => 'dashboard']);
        // $this->middleware('two_factor');
    }
    
    /**
     * Show the dashboard page
     * 
     * @param  User   $user the active user
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if ($user = Auth::user()) {
            $user = User::with('scans.group.scans', 'scans.districts', 'scans.comparisons');
        }

        // Remember new Single session messessage until dashboard is viewed, and display it once.
        session()->flash('newsinglesessionflash', session('newsinglesession'));
        session()->forget('newsinglesession');


    	return view('pages.dashboard', compact('user'));
    }

    /**
     * Show the films page
     * 
     * @return \Illuminate\Http\Response
     */
    public function introductiefilm()
    {
    	return view('pages.introductiefilm');
    }

    /**
     * Show the cijfers page
     * 
     * @return \Illuminate\Http\Response
     */
    public function cijfersuitderegio()
    {
        return view('pages.cijfersuitderegio');
    }

    /**
     * Show the cookies page
     * 
     * @return \Illuminate\Http\Response
     */
    public function cookies()
    {
        return view('pages.cookies');
    }
}
