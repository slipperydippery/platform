<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiSendMessageController extends Controller
{
    public function send(Request $request)
    {
    	return $request->all();
    }
}
