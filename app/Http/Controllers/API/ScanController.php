<?php

namespace App\Http\Controllers\API;

use App\Scan;
use App\Events\GroupUpdated;
use Illuminate\Http\Request;
use App\Events\AlgemeenbeeldUpdated;
use App\Http\Controllers\Controller;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Scan::with(
            'user', 
            'answers', 
            'districts', 
            'instantie'
        )->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Scan $scan
     * @return \Illuminate\Http\Response
     */
    public function show(Scan $scan)
    {
        $scan = Scan::with(
            'user', 
            'answers', 
            'districts', 
            'instantie'
        )->find($scan->id);

        return $scan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Scan $scan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scan $scan)
    {
        $scan->amend($request->scan);
        if(isset($request->scan['districts']))
        {
             $scan->amendDistricts($request->scan['districts']);
        }

        if($scan->group && $scan->group->scan->id == $scan->id) {
            $scan->group->mirrorScanToGroup($scan);
        }

        if($scan->group) {
            AlgemeenbeeldUpdated::dispatch($scan->group->id);
        }
        return $scan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Scan $scan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scan $scan)
    {
        if ($scan->group) {
            $group = $scan->group;
            GroupUpdated::dispatch($scan->group->id, $event, 'sessionremovedfromgroup');
        }

        $scan->districts()->detach();

        $scan->delete();
    }
}
