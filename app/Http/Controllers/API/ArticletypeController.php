<?php

namespace App\Http\Controllers\API;

use App\Articletype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticletypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Articletype::orderBy('order')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articletype = Articletype::create([
            'title' => $request->articletype['title'],
            'description' => $request->articletype['description'],
            'scanmodel_id' => 1,
        ]);

        return $articletype;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Articletype $articletype
     * @return \Illuminate\Http\Response
     */
    public function show(Articletype $articletype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Articletype $articletype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articletype $articletype)
    {
        $articletype->title = $request->articletype['title'];
        $articletype->description = $request->articletype['description'];
        $articletype->order = $request->articletype['order'];

        $articletype->save();
        
        return $articletype;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Articletype $articletype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articletype $articletype)
    {
        //
    }
}
