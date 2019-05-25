<?php

namespace App\Http\Controllers;

use App\Article;
use App\Scanmodel;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
        $articles = Article::with('articletypes', 'questions')->orderBy('updated_at')->get();
        $scanmodel = Scanmodel::with('themes.questions', 'articletypes')->find(1);
        return view('article.index', compact('articles', 'scanmodel'));
    }
}
