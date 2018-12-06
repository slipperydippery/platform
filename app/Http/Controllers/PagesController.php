<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
    	return view('pages.dashboard', compact('user'));
    }

    public function introductiefilm()
    {
    	return view('pages.introductiefilm');
    }
}
