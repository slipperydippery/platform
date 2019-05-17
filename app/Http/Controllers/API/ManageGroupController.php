<?php

namespace App\Http\Controllers\API;

use App\Scan;
use App\Group;
use App\Events\GroupUpdated;
use Illuminate\Http\Request;
use App\Events\GroupAdminUpdated;
use App\Http\Controllers\Controller;

class ManageGroupController extends Controller
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


    public function promoteuser(Request $request, Group $group)
    {
    	$scan = Scan::find($request->scan['id']);
    	$group->scan()->associate($scan);
    	$group->user()->associate($scan->user);

    	$group->save();

    	GroupAdminUpdated::dispatch($group->id);
    	GroupUpdated::dispatch($group->id, 'groupadminupdated', $scan->id);

    	return $group;
    }
}
