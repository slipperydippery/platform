<?php

namespace App\Http\Controllers;

use App\Answer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\GroupscoresUpdated;

class ApiAnswerController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        return $answer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $answer->answer = $request['answer']['answer'];
        $answer->updated_at = Carbon::now();
        $answer->save();
        if($answer->scan->group) {
            GroupscoresUpdated::dispatch($answer->scan->group->id);
        }
        
        return $answer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
