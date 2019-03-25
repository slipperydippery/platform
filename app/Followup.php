<?php

namespace App;

use App\Group;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    public function group()
    {
    	return $this->belongsTo(Group::class);
    }
}
