<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateScanController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

        public function start()
    {
    	return view('createscan.start');
    }
}
