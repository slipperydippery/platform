<?php

namespace App;

use App\User;
use App\Group;
use App\Answer;
use App\Measure;
use App\District;
use App\Question;
use App\Instantie;
use App\Scanmodel;
use App\Comparison;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\GeneratesUuid;

class Scan extends Model
{
    use GeneratesUuid;

	protected $fillable = ['title', 'instantie_id', 'scanmodel_id', 'group_id', 'algemeenbeeld'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function group()
    {
    	return $this->belongsTo(Group::class);
    }

    public function instantie()
    {
        return $this->belongsTo(Instantie::class);
    }

    public function ownsgroups()
    {
    	return $this->hasMany(Group::class);
    }

    public function scanmodel()
    {
    	return $this->belongsTo(Scanmodel::class);
    }

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }

    public function measures()
    {
        return $this->hasMany(Measure::class);
    }

    public function districts()
    {
    	return $this->belongsToMany(District::class);
    }

    public function comparisons()
    {
        return $this->hasMany(Comparison::class);
    }

    public function isowner()
    {
    	if($this->group){
	    	return ($this->group->scan->id == $this->id);
    	}
    	return false;
    }

    public function answercount()
    {
        $answerCount = 0;
        forEach($this->answers as $answer) {
            if ($answer->updated_at != $answer->created_at){
                $answerCount++;
            }
        }
    	return $answerCount;
    }

    public function isComplete()
    {
        if($this->complete) {
            return true;
        }
        if(! $this->algemeenbeeld) {
            return false;
        }
        $answerCount = 0;
        forEach($this->answers as $answer) {
            if ($answer->updated_at != $answer->created_at){
                $answerCount++;
            }
        }
        if($answerCount != $this->answers->count()){
            return false;
        }
        return true;
    }

    public static function register($attributes)
    {
    	if($attributes['isgroup'] == true){
    		$ownerscan = Group::find($attributes['group_id'])->scan;
    		$attributes['title'] = $ownerscan->title;
    		forEach($ownerscan->districts as $district) {
    			$attributes['districts'][] = $district->id; 
    		}
    	}
    	$scan = new Scan($attributes);
    	auth()->user()->scans()->save($scan);
    	$scan->registerDistricts($scan, $attributes['districts']);

        Question::generateAnswers($scan);

        return $scan;
    }

    public function registerDistricts(Scan $scan, $districts)
    {
    	forEach($districts as $district) {
    		$scan->districts()->attach(District::find($district));
    	}
    }

}
