<?php

namespace App;

use App\Group;
use Illuminate\Database\Eloquent\Model;

class Netwerkanalyse extends Model
{
	protected $guarded = [];

    public function groups()
    {
    	return $this->belongsTo(Group::class);
    }
}
