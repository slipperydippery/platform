<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function sender()
    {
    	return $this->belongsTo(User::class);
    }

    public function recipient()
    {
    	return $this->belongsTo(User::class, 'recipient_id');
    }
}
