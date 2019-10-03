<?php

namespace App\Http\Controllers\API;

use App\Netwerkpartner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NetwerkpartnerController extends Controller
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
     * @param  int  Netwerkpartner $netwerkpartner
     * @return \Illuminate\Http\Response
     */
    public function show(Netwerkpartner $netwerkpartner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Netwerkpartner $netwerkpartner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Netwerkpartner $netwerkpartner)
    {
        $netwerkpartner->active = $request->input('netwerkpartner.active');
        $netwerkpartner->save();
        return $netwerkpartner;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Netwerkpartner $netwerkpartner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Netwerkpartner $netwerkpartner)
    {
        //
    }
}
