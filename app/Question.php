<?php

namespace App;

use App\Scan;
use App\Theme;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function theme()
    {
    	return $this->belongsTo(Theme::class);
    }

    public static function generateAnswers(Scan $scan)
    {
        foreach($scan->scanmodel->themes as $theme) {
            foreach($theme->questions as $question) {
                Answer::create([
                    'scan_id' => $scan->id,
                    'question_id' => $question->id
                ]);
                Measure::create([
                    'scan_id' => $scan->id,
                    'question_id' => $question->id
                ]);
            }
        }
    }
}
