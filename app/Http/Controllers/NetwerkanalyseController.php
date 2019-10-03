<?php

namespace App\Http\Controllers;

use App\Group;
use App\Instantie;
use App\Leefgebied;
use App\Netwerkanalyse;
use Illuminate\Http\Request;

class NetwerkanalyseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $netwerkanalyses = Netwerkanalyse::get();
        return view('netwerkanalyse.create', compact ('netwerkanalyses') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $netwerkanalyse = Netwerkanalyse::create([
            ''
        ]);
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
        $leefgebeids = Leefgebied::with('organisaties')->get();
        $netwerkanalyse = Netwerkanalyse::with('netwerkpartners')->find($netwerkanalyse->id);
        return view('netwerkanalyse.edit', compact('netwerkanalyse', 'leefgebeids'));
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
