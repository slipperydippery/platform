<?php

namespace App\Http\Controllers;

use App\Scan;
use App\District;
use App\Comparison;
use Illuminate\Http\Request;

class ApiComparisonController extends Controller
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
        $scan = Scan::find($request->scan['id']);
        $title = 'Vergelijking met ' . $scan->title . ' #' . ($scan->comparisons->count() + 1);
        $comparison = Comparison::create([
            'scan_id' => $request->scan['id'],
            // 'scanmodel_id' => $request->scanmodel_id,
            // 'instantie_id' => $request->instantie_id,
            'title' => $title,
        ]);
        $comparison->save();
        foreach ($request->districts as $district) {
            $comparison->districts()->attach(District::find($district));
        }
        foreach ($request->scans as $scan) {
            $comparison->scans()->attach(Scan::find($scan['id']));
        }
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
        return Comparison::with('scan.user', 'scan.answers', 'scan.districts', 'scans.user', 'scans.answers', 'scans.instantie')->find($comparison->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Comparison $comparison
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
