<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
	/**
	 * Enforce middleware.
	 */
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function show()
    {
    	return view('auth.changepassword');
    }

    public function update(Request $request)
    {
    	$user = Auth::user();
    	$validatedData = $request->validate([
    	    'oldpassword' => ['required', 'string', 'min:6'],
    	    'password' => ['required', 'string', 'min:6', 'confirmed'],
    	]);

    	if (! Hash::check($request->oldpassword, $user->password)) {
    		return redirect()->back()->withErrors(['oldpassword' => 'Je hebt het verkeerde wachtwoord ingevoerd']);
    	}

    	$user->password = Hash::make($request->password);
    	$user->save();
    	session()->flash('status', 'Je wachtwoord is aangepast');
    	return redirect()->route('dashboard');

    }
}
