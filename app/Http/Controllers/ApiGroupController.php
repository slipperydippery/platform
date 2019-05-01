<?php

namespace App\Http\Controllers;

use App\Group;
use App\Events\GroupUpdated;
use Illuminate\Http\Request;

class ApiGroupController extends Controller
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
     * @param  int  Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return Group::with('scan.user', 'scan.answers', 'scan.districts', 'scans.user', 'scans.answers', 'scans.instantie', 'user')->where('id', $group->id)->get()->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
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
        $group->title = $request['group']['title'];
        $group->scan_id = $request['group']['scan_id'];
        $group->datetime = $request['group']['datetime'];
        $group->unlocked = $request['group']['unlocked'];

        $group->save();
        $event = 'grouplockupdated';
        GroupUpdated::dispatch($group->id, $event);
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
        //
    }
}
