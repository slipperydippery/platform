<?php

namespace App\Http\Controllers\API;

use App\Followup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowupController extends Controller
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
     * @param  int  Followup $followup
     * @return \Illuminate\Http\Response
     */
    public function show(Followup $followup)
    {
        return $followup;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Followup $followup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Followup $followup)
    {
        $followup->datetime = $request['followup']['datetime'];

        $followup->save();
        
        return $followup;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Followup $followup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Followup $followup)
    {
        //
    }
}
