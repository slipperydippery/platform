<?php

namespace App\Http\Controllers;

use App\Followup;
use Illuminate\Http\Request;

class ApiFollowupController extends Controller
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
     * @param  int  Followup $followup
     * @return \Illuminate\Http\Response
     */
    public function show(Followup $followup)
    {
        return $followup;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Followup $followup
     * @return \Illuminate\Http\Response
     */
    public function edit(Followup $followup)
    {
        //
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
        // return $request->all();
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
