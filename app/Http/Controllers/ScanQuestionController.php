<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Theme;
use App\Followup;
use App\Question;
use Illuminate\Http\Request;

class ScanQuestionController extends Controller
{
    /**
     * Enforce middleware.
     */
    public function __construct()
    {
        $this->middleware('owner');
        $this->middleware('unlocked', ['except' => 'complete']);
    }

    public function intro(Scan $scan, Theme $theme)
    {
    	$previous = '/sessie/' . $scan->id . '/thema/' . ($theme->id - 1) . '/measures';
    	if($theme->id == Theme::get()->first()->id){
    		$previous = '/sessie/' . $scan->id . '/algemeenbeeldresultaten';
            if( ! $scan->group) {
                $previous = '/sessie/' . $scan->id . '/algemeenbeeld';
            }
    	}

    	$next = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/vraag/' . $theme->questions()->first()->id;

    	return view('scanquestions.themeintro', compact('scan', 'theme', 'previous', 'next'));
    }

    public function show(Scan $scan, Theme $theme, Question $question)
    {
    	if($question->theme->id != $theme->id) {
    		return redirect()->route('scanquestions.show', [$scan, $question->theme, $question]);
    	}

    	$answer = $scan->answers->where('question_id', $question->id)->first();


		$previous = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/introductie';
    	if($question->id !== $theme->questions->first()->id){
            $previousquestion = Question::where('order', $question->order - 1)->first();
            $previous = route('scanquestions.show', [$scan->id, $theme->id, $previousquestion->id]);
        	// $previous = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/vraag/' . ($question->id - 1);
    	}

		$next = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/resultaten';
        if (! $scan->group) {
            $next = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/acties';
        }
    	if($question->id !== $theme->questions->last()->id){
            $nextquestion = Question::where('order', $question->order + 1)->first();
            $next = route('scanquestions.show', [$scan->id, $theme->id, $nextquestion->id]);
        	// $next = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/vraag/' . ($question->id + 1);
    	}

    	return view('scanquestions.show', compact('scan', 'theme', 'question', 'previous', 'next', 'answer'));
    }

    public function results(Scan $scan, Theme $theme)
    {
    	$previous = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/vraag/' . $theme->questions->last()->id;
    	$next = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/acties';
    	return view('scanquestions.results', compact('scan', 'theme', 'previous', 'next'));
    }

    public function measures(Scan $scan, Theme $theme)
    {
    	$previous = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/resultaten';
        if ($scan->group) {
            $previous = '/sessie/' . $scan->id . '/thema/' . $theme->id . '/vraag/' . $theme->questions->last()->id;
        }
    	$next = '/sessie/' . $scan->id . '/thema/' . ($theme->id + 1) . '/introductie';
    	if($theme->id == Theme::get()->last()->id) {
    		$next = '/sessie/' . $scan->id . '/actiesuitwerkenintro';
    	}
    	return view('scanquestions.measures', compact('scan', 'theme', 'previous', 'next'));
    }

    public function bigmeasuresintro(Scan $scan)
    {
        $previous = '/sessie/' . $scan->id . '/thema/' . Theme::get()->last()->id . '/acties';
        $next = '/sessie/' . $scan->id . '/thema/' . Theme::get()->first()->id . '/actiesuitwerken';

        return view('scanquestions.bigmeasuresintro', compact('scan', 'previous', 'next'));
        
    }

    public function bigmeasures(Scan $scan, Theme $theme)
    {
        $previous = '/sessie/' . $scan->id . '/thema/' . ($theme->id - 1) . '/actiesuitwerken';
        if($theme->id == Theme::get()->first()->id){
            $previous = '/sessie/' . $scan->id . '/actiesuitwerkenintro';
        }        
        $next = '/sessie/' . $scan->id . '/thema/' . ($theme->id + 1) . '/actiesuitwerken';
        if($theme->id == Theme::get()->last()->id) {
            $next = '/sessie/' . $scan->id . '/vervolgafspraak';
            if (! $scan->group) {
                $next = '/sessie/' . $scan->id . '/afgerond';
            }
        }
        $scan = Scan::with('group.scans.user')->find($scan->id);
        return view('scanquestions.bigmeasures', compact('scan', 'theme', 'previous', 'next'));
    }

    public function followup(Scan $scan)
    {
        if (! $scan->group->followup) {
            $scan->group->followup()->save(new Followup);
        }
        $followup = $scan->group->followup;
        $previous = '/sessie/' . $scan->id . '/thema/' . Theme::get()->last()->id . '/actiesuitwerken';
        $next = '/sessie/' . $scan->id . '/afgerond';
        return view('scanquestions.followup', compact('scan', 'previous', 'next', 'followup'));
    }

    public function commitdatetime(Request $request, Scan $scan)
    {
        request()->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);
        if($scan->followup){
            $scan->followup->date = $request->date;
            $scan->followup->time = $request->time;
            $scan->followup->save();
            return redirect()->route('scanquestions.complete', $scan);
        }
        $followup = new Followup([
            'date' => $request->date,
            'time' => $request->time,
            'scan_id' => $scan->id
        ]);
        $followup->save();
        return redirect()->route('scanquestions.complete', $scan);
    }

    public function complete(Scan $scan)
    {
        if ( $scan->group && $scan->group->scan->id == $scan->id) {
            $incompletescans = [];
            foreach ($scan->group->scans as $thisscan) {
                if(! $thisscan->isComplete()) $incompletescans[] = $thisscan ;
            }
            $previous = '/sessie/' . $scan->id . '/vervolgafspraak';
            $next = '/scan/' . $scan->id;
            return view('scanquestions.groupincomplete', compact('scan', 'previous', 'next', 'incompletescans'));
        }
        if( ! $scan->isComplete() ) {
            $previous = '/sessie/' . $scan->id . '/vervolgafspraak';
            return view('scanquestions.incomplete', compact('scan', 'previous'));
        }
        if ($scan->group){
            return redirect()->route('scan.show', $scan->group->scan);
        }

        return view('scanquestions.complete', compact('scan'));
    }

    public function markcomplete(Scan $scan)
    {
        $scan->complete = true;
        $scan->save();

        return redirect()->route('scan.show', $scan);
    }
}
