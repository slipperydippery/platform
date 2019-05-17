<?php

namespace App\Http\Controllers\API;

use App\Group;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionGroupAnswerController extends Controller
{
	public function index(Question $question, Group $group)
	{
        $answers = [];
		foreach ($group->scans as $scan) {
			$answers[] = Answer::where('scan_id', $scan->id)->where('question_id', $question->id)->first();
		}
		return $answers;
	}
}
