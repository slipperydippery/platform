<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Question;
use Illuminate\Http\Request;

class ApiScanQuestionController extends Controller
{
    public function getanswers(Scan $scan, Question $question)
    {
        $answers = [];
        foreach($question->answers as $answer){
            if($answer->scan->group->id == $scan->group->id){
                $answers[] = $answer;
            }
        }
    	return $answers;
    	
    }
}
