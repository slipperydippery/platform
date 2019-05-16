<?php

namespace App\Http\Controllers\API;

use App\Scan;
use App\District;
use App\Comparison;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scan = Scan::find($request->scan['id']);

        $title = 'Vergelijking met ' . $scan->title . ' #' . ($scan->comparisons->count() + 1);

        $comparison = Comparison::create([
            'scan_id' => $request->scan['id'],
            'title' => $title,
        ]);

        $comparison->districts()->sync( $request->districts );

        $comparison->scans()->sync( map_array_to_attribute($request->scans, 'id') );

        session()->forget('createcomparison');

        return $comparison;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Comparison $comparison
     * @return \Illuminate\Http\Response
     */
    public function show(Comparison $comparison)
    {
        return Comparison::with(
            'scan.user', 
            'scan.answers', 
            'scan.districts', 
            'scans.user', 
            'scans.answers', 
            'scans.instantie', 
            'scans.districts'
        )->find( $comparison->id );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Comparison $comparison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comparison $comparison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Comparison $comparison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comparison $comparison)
    {
        //
    }
}
