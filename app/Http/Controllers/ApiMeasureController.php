<?php

namespace App\Http\Controllers;

use App\Measure;
use Illuminate\Http\Request;

class ApiMeasureController extends Controller
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
     * @param  int  Measure $measure
     * @return \Illuminate\Http\Response
     */
    public function show(Measure $measure)
    {
        return Measure::with('scan.user', 'frontrunner.user')->find($measure->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Measure $measure
     * @return \Illuminate\Http\Response
     */
    public function edit(Measure $measure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Measure $measure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measure $measure)
    {
        $measure->active = $request['measure']['active'];
        $measure->measure = $request['measure']['measure'];
        $measure->frontrunner_id = $request['measure']['frontrunner']['id'];
        $measure->save();

        return $measure;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Measure $measure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measure $measure)
    {
        //
    }
}
