<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notifications\GroupRemoved;
use App\Notifications\MessageReceived;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sharepermission = $request->sharepermission == 'on' ? true : false;
        $user->save();
        session()->flash('status', 'Je profiel is bijgewerkt');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        foreach ($user->scans as $scan) {
            if($scan->group){
                if ($scan->group->scan->id == $scan->id) {
                    foreach ($scan->group->scans as $thisscan) {
                        if ($thisscan->id != $scan->id) {
                            $recipient = $thisscan->user;
                            if ($thisscan->districts->count()) {
                                $thisscan->districts()->detach();
                            }
                            $thisscan->delete();
                            $recipient->notify(new GroupRemoved($scan->group));
                        }
                    }
                }
            }
            $scan->districts()->detach();
            $scan->delete();
        }
        $user->delete();
        return redirect()->route('dashboard');
    }
}
