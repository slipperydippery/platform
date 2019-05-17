<?php

namespace App\Http\Controllers\API;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinGroupController extends Controller
{
    public function joinwithcode(Request $request)
    {
        $code = strtoupper($request->code);

        if($group = Group::where('code', $code)->first()) {
        	return [
        		'group' => $group, 
        		'code' => $request->code, 
        		'message' => 'success'
        	];
        }
        
        return ['error' => 'We hebben geen groep met deze code kunnen vinden'];
    }
}
