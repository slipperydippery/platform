<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanPagesController extends Controller
{
    public function new()
    {
    	return view('scan.new');
    }
}
