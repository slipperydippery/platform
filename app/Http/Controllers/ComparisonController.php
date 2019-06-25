<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Comparison;
use Illuminate\Http\Request;

class ComparisonController extends Controller
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
     * @param  \App\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function show(Comparison $comparison)
    {
        if (Carbon::now()->subMinutes(1) <= $comparison->created_at) { //comparison is created in the past minute
             session()->forget('createcomparison');
             session()->put('newcomparison', $comparison);
         } 
        return view('comparison.show', compact('comparison'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function edit(Comparison $comparison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comparison $comparison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comparison $comparison)
    {
        //
    }
}
