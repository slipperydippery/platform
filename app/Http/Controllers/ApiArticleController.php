<?php

namespace App\Http\Controllers;

use App\Article;
use App\Question;
use App\Articletype;
use Illuminate\Http\Request;

class ApiArticleController extends Controller
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
        $order = Article::get()->count();
        $article = Article::create([
            'title' => $request->article['title'],
            'description' => $request->article['description'],
            'year' => $request->article['year'],
            'linktype' => $request->article['linktype'],
            'link' => $request->article['link'],
            'order' => $order,
        ]);
        foreach ($request->article['articletypes'] as $articletype) {
            $articletype = Articletype::find($articletype['id']);
            $article->articletypes()->attach($articletype);
        }
        foreach ($request->article['questions'] as $question) {
            $question = Question::find($question['id']);
            $article->questions()->attach($question);
        }
        $articles = Article::with('articletypes', 'questions')->orderBy('updated_at')->get();
        return $articles;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
            $article->title = $request->article['title'];
            $article->description = $request->article['description'];
            $article->year = $request->article['year'];
            $article->linktype = $request->article['linktype'];
            $article->link = $request->article['link'];
            $article->order = $request->article['order'];
            $article->save();

            $article->articletypes()->detach();
            foreach ($request->article['articletypes'] as $articletype) {
                $articletype = Articletype::find($articletype['id']);
                $article->articletypes()->attach($articletype);
            }

            $article->questions()->detach();
            foreach ($request->article['questions'] as $question) {
                $question = Question::find($question['id']);
                $article->questions()->attach($question);
            }

            return $article;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
