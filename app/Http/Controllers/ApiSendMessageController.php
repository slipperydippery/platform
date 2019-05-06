<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Notifications\MessageReceived;

class ApiSendMessageController extends Controller
{
    public function send(Request $request)
    {
    	$sender = auth('api')->user();
    	$recipient = User::find($request->scan['user']['id']);
    	$message = new Message([
    		'user_id' => $sender->id,
    		'recipient_id' => $recipient->id,
    		'message' => $request->message,
    	]);
    	$message->save();
    	$recipient->notify(new MessageReceived($message));
    	return $request->all();
    }
}
