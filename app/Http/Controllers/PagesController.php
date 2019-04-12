<?php

namespace App\Http\Controllers;

use Auth;
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
        $this->middleware('auth');
        $this->middleware('verified');
        // $this->middleware('two_factor');
    }
    
    public function dashboard()
    {
        $user = Auth::user();
    	return view('pages.dashboard', compact('user'));
    }

    public function introductiefilm()
    {
    	return view('pages.introductiefilm');
    }

    public function cijfersuitderegio()
    {
        return view('pages.cijfersuitderegio');
    }

    public function cookies()
    {
        return view('pages.cookies');
    }
}
