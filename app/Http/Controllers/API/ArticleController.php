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

        $order = Article::get()->count() + 1;
        $article = Article::create([
            'title' => $articleinput->title,
            'description' => $articleinput->description,
            'linktype' => $articleinput->linktype,
            'link' => $articleinput->link,
            'order' => $order,
        ]);
        if($articleinput->year) {
            $article->year = $articleinput->year;
        }
        foreach ($articleinput->articletypes as $articletype) {
            $articletype = Articletype::find($articletype->id);
            $article->articletypes()->attach($articletype);
        }
        foreach ($articleinput->questions as $question) {
            $question = Question::find($question->id);
            $article->questions()->attach($question);
        }

        if ($articleinput->linktype == 'file' && $pdf = $request->file('pdf')) {
            $pdf->storeAs('public/pdfs/' . $article->id . '/', $pdf->getClientOriginalName());
            $article->link = 'storage/pdfs/' . $article->id . '/' . $pdf->getClientOriginalName();
            $article->save();
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
        $articleinput = json_decode($request->article);

        $article->title = $articleinput->title;
        $article->description = $articleinput->description;
        $article->year = $articleinput->year;
        $article->linktype = $articleinput->linktype;
        $article->link = $articleinput->link;
        $article->order = $articleinput->order;
        $article->save();

        if($article->articletypes){
            $article->articletypes()->detach();
        }
        foreach ($articleinput->articletypes as $articletype) {
            $articletype = Articletype::find($articletype->id);
            $article->articletypes()->attach($articletype);
        }

        if($article->questions){
            $article->questions()->detach();
        }
        foreach ($articleinput->questions as $question) {
            $question = Question::find($question->id);
            $article->questions()->attach($question);
        }

        if ($request->file) {
            $pdf = $request->file('pdf');
            $pdf->storeAs('public/pdfs/' . $article->id . '/', $pdf->getClientOriginalName());
            $article->link = 'storage/pdfs/' . $article->id . '/' . $pdf->getClientOriginalName();
            $article->save();
        }

        return $article;
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

        $article->title = $articleinput->title;
        $article->description = $articleinput->description;
        $article->year = $articleinput->year;
        $article->linktype = $articleinput->linktype;
        $article->link = $articleinput->link;
        $article->order = $articleinput->order;
        $article->save();

        if($article->articletypes){
            $article->articletypes()->detach();
        }
        foreach ($articleinput->articletypes as $articletype) {
            $articletype = Articletype::find($articletype->id);
            $article->articletypes()->attach($articletype);
        }

        if($article->questions){
            $article->questions()->detach();
        }
        foreach ($articleinput->questions as $question) {
            $question = Question::find($question->id);
            $article->questions()->attach($question);
        }

        if ($request->file) {
            $pdf = $request->file('pdf');
            $pdf->storeAs('public/pdfs/' . $article->id . '/', $pdf->getClientOriginalName());
            $article->link = 'storage/pdfs/' . $article->id . '/' . $pdf->getClientOriginalName();
            $article->save();
        }

        $articles = Article::with('articletypes', 'questions')->orderBy('updated_at')->get();
        return $articles;
    }
}
