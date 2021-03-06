<?php

namespace App\Http\Controllers\API;

use App\Group;
use App\Events\GroupUpdated;
use Illuminate\Http\Request;
use App\Notifications\GroupRemoved;
use App\Http\Controllers\Controller;

class GroupController extends Controller
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
     * @param  int  Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return Group::with(
            'scan.user', 
            'scan.answers', 
            'scan.districts', 
            'scans.user', 
            'scans.answers', 
            'scans.instantie', 
            'user'
        )->where('id', $group->id)->get()->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        // return $request->all();
        $group->amend($request->group);

        $group->save();

        GroupUpdated::dispatch($group->id, 'grouplockupdated');

        return $group;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Group $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $scan = $group->scan;
        // GroupUpdated::dispatch($group->id, 'groupinfoupdated');
        foreach ($group->scans as $thisscan) {
            if ($thisscan->id != $scan->id) {
                $recipient = $thisscan->user;
                if ($thisscan->districts->count()) {
                    $thisscan->districts()->detach();
                }
                $thisscan->delete();
                $recipient->notify(new GroupRemoved($group));

            }
        }
        $scan->districts()->detach();
        $scan->delete();
        $group->delete();
        return 'success';
    }
}
