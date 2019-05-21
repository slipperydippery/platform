<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Question;
use App\Articletype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Enforce middleware.
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::with('articletypes', 'questions')->orderBy('updated_at')->get()->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articleinput = json_decode($request->article);

        $article = Article::register($articleinput);

        if ($articleinput->linktype == 'file' && $file = $request->file('file')) {
            Article::registerFile($article, $file);
        }

        $articles = Article::with('articletypes', 'questions')->orderBy('updated_at')->get();
        return $articles;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postpatch(Request $request)
    {
        $articleinput = json_decode($request->article);
        $article = Article::find($articleinput->id);

        $article->amend($articleinput);

        if ($articleinput->linktype == 'file' && $file = $request->file('file')) {
            Article::registerFile($article, $file);
        }
        
        $articles = Article::with('articletypes', 'questions')->orderBy('updated_at')->get();
        return $articles;
    }
}
