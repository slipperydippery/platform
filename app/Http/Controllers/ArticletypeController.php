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
        $this->middleware('scadmin');
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
}
