<?php

namespace App\Http\Controllers;

use App\Articletype;
use Illuminate\Http\Request;

class ArticletypeController extends Controller
{
    /**
     * Enforce middleware.
     */
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
        $articletypes = Articletype::orderBy('order')->get();
        return view('articletype.index', compact('articletypes'));
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
     * @param  \App\Articletype  $articletype
     * @return \Illuminate\Http\Response
     */
    public function show(Articletype $articletype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articletype  $articletype
     * @return \Illuminate\Http\Response
     */
    public function edit(Articletype $articletype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articletype  $articletype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articletype $articletype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articletype  $articletype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articletype $articletype)
    {
        //
    }
}
