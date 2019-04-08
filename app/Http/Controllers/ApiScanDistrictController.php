<?php

namespace App\Http\Controllers;

use App\Scan;
use App\District;
use Illuminate\Http\Request;

class ApiScanDistrictController extends Controller
{
    public function update(Request $request, Scan $scan)
    {
        $scan->districts()->detach();
    	foreach ($request->districts as $district) {
    		$thisdistrict = District::find($district['id']);
    		$scan->districts()->save($thisdistrict);
    	}
    	return $request;
    }
}
