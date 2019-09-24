<?php

namespace App\Http\Controllers;

use Auth;
use App\Scan;
use App\User;
use App\Group;
use App\District;
use App\Question;
use App\Instantie;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('scadmin', ['except' => 'loginasuser']);
	}

    /**
     * Logs in to user with order == $user_nr
     * 
     * @param  int $user_nr 
     * @return \Illuminate\Http\Response
     */
    public function loginasuser($user_nr)
    {
    	$user = 
            User::where('order', $user_nr)
                ->first();

        Auth::loginUsingId( $user->id );
        
        return redirect()->back();
    }

    /**
     * Show the page with an overview of all relevant results
     * 
     * @return \Illuminate\Http\Response 
     */
    public function globalresults()
    {
    	$users =       User::get();
    	$scans =       Scan::with('answers')
                            ->get();
    	$groups =      Group::get();
    	$instanties =  Instantie::get();
    	$questions =   Question::with('measures')
                            ->get();
    	$districts =   District::withCount('scans')
                	        ->orderBy('scans_count', 'desc')
                	        ->orderBy('name')
                	        ->paginate(50);

    	return view('admin.globalresults', 
            compact(    'users', 
                        'scans', 
                        'groups', 
                        'instanties', 
                        'questions', 
                        'districts'
                    ));
    }
}
