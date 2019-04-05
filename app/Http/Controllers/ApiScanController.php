<?php

namespace App\Http\Controllers;

use App\Scan;
use Illuminate\Http\Request;
use App\Events\AlgemeenbeeldUpdated;

class ApiScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Scan $scan
     * @return \Illuminate\Http\Response
     */
    public function edit(Scan $scan)
    {
        //
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
        $scan->title = $request->scan['title'];
        $scan->description = $request->scan['description'];
        $scan->algemeenbeeld = $request->scan['algemeenbeeld'];
        if($scan->group) {
            $scan->group_id = $request->scan['group_id'];
        }
        $scan->save();
        if($scan->group) {
            AlgemeenbeeldUpdated::dispatch($scan->group->id);
        }
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Scan $scan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scan $scan)
    {
        //
    }
}