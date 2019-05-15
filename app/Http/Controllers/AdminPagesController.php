<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function loginasuser($user_nr)
    {
    	$user = User::where('order', $user_nr)->first();
        Auth::loginUsingId($user->id);
        return redirect()->back();
    }
}
