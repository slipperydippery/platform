<?php

namespace App\Http\Controllers;

use App\Scan;
use Illuminate\Http\Request;

class ScanPagesController extends Controller
{
    public function start(Scan $scan)
    {
    	return view	('scan.start');
    }
}
