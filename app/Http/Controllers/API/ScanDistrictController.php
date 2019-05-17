<?php

namespace App\Http\Controllers\API;

use App\Scan;
use App\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScanDistrictController extends Controller
{
    public function update(Request $request, Scan $scan)
    {
    	$scan->districts()->sync( map_array_to_attribute($request->districts, 'id') );

    	return $scan->districts;
    }
}
