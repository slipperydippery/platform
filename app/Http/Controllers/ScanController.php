<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Group;
use App\Measure;
use App\District;
use App\Question;
use App\Instantie;
use App\scanmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Notifications\GroupRemoved;

class ScanController extends Controller
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
        $instanties = Instantie::get();
        $districts = District::get();
        $groups = Group::with('user')->get();
        $isgroup = false;
        if (request()->query('group')){
            $isgroup = true;
        }
        return view('scan.create', compact('instanties', 'districts', 'isgroup', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isgroup) {
            request()->validate([
                'group_id' => 'required|integer',
                'instantie_id' => 'required|integer',
            ]);
            if(Group::find($request->group_id)->authhasscan()){
                return 'sorry you have a scan already bro';
            }
        } else {
            request()->validate([
                'title' => 'required|min:3|max:255',
                'instantie_id' => 'required|integer',
                'districts' => 'required'
            ]);
        }

        $scan = Scan::register($request->all());

        return redirect()->route('scan.created', $scan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function show(Scan $scan)
    {

        $articles = [];
        foreach ($scan->measures as $measure) {
            if ($measure->active) {
                foreach ($measure->question->articles as $article) {
                    if(! in_array($article->id, map_array_to_attribute($articles, 'id'))){
                        $article->matchcount = 1;
                        // $article->relatedmeasures = [$measure];
                        $articles[] = $article;
                    } 
                    else {
                        foreach ($articles as $key => $value) {
                            if( $value->id == $article->id ){
                                $value->matchcount++;
                                // $value->relatedmeasures[] = $measure;
                            }
                        }
                    }
                }
            }
        }
        usort($articles, function($item1, $item2){
            return $item2['matchcount'] <=> $item1['matchcount'];
        });
        $articles = collect($articles);
        return view('scan.show', compact('scan', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function edit(Scan $scan)
    {
        // $isgroup = $scan->group ? true : false;
        $isgroup = false;   // $isgroup = true will allow a scan to select a group to join
        $instanties = Instantie::get();
        $districts = District::get();
        return view('scan.edit', compact('scan','isgroup', 'instanties', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scan $scan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scan $scan)
    {
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
        return redirect()->route('dashboard');
    }
}
