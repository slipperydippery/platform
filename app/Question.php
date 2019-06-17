<?php

namespace App;

use App\Scan;
use App\Theme;
use App\Answer;
use App\Article;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function theme()
    {
    	return $this->belongsTo(Theme::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function measures()
    {
        return $this->hasMany(Measure::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
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
                    'question_id' => $question->id,
                    'frontrunner_id' => null,
                ]);
            }
        }
    }
}
