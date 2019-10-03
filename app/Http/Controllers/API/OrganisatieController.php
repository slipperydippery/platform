<?php

namespace App\Http\Controllers\API;

use App\Organisatie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganisatieController extends Controller
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
     * @param  int  Organisatie $organisatie
     * @return \Illuminate\Http\Response
     */
    public function show(Organisatie $organisatie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Organisatie $organisatie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisatie $organisatie)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Organisatie $organisatie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisatie $organisatie)
    {
        //
    }
}
