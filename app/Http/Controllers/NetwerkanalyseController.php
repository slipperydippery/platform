<?php

namespace App\Http\Controllers;

use App\Group;
use App\Netwerkanalyse;
use Illuminate\Http\Request;

class NetwerkanalyseController extends Controller
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
    public function create(Group $group)
    {
        if(! $group->netwerkanalyse()->exists()) {
            $group->netwerkanalyse()->create([]);
        }
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
     * @param  \App\Netwerkanalyse  $netwerkanalyse
     * @return \Illuminate\Http\Response
     */
    public function show(Netwerkanalyse $netwerkanalyse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Netwerkanalyse  $netwerkanalyse
     * @return \Illuminate\Http\Response
     */
    public function edit(Netwerkanalyse $netwerkanalyse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Netwerkanalyse  $netwerkanalyse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Netwerkanalyse $netwerkanalyse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Netwerkanalyse  $netwerkanalyse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Netwerkanalyse $netwerkanalyse)
    {
        //
    }
}
