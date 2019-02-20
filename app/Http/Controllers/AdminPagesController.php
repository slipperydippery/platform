<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function loginasuser(User $user)
    {
        Auth::loginUsingId($user->id);
        return redirect()->back();
    }
}
