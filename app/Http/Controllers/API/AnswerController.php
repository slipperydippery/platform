<?php

namespace App\Http\Controllers\API;

use App\Answer;
use Carbon\Carbon;
use App\Events\GroupUpdated;
use Illuminate\Http\Request;
use App\Events\GroupscoresUpdated;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
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
            $event = 'groupscoresupdated';
            GroupUpdated::dispatch($answer->scan->group->id, $event);
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
