@extends('layouts.app', ['title' => 'Overzicht all resultaten'])

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="pagetitle">Overzicht resultaten</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="h2">Overzicht Gebruikers</div>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Gebruikers</th>
                        <td> {{ $users->count() }} </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <th scope="row"># ingelogd (sinds 19-03-2018)</th>
                        @php
                            $logincount = 0;
                            foreach($users as $user) {
                                $logincount += $user->logincount;
                            }
                        @endphp
                        <td> {{ $logincount }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <div class="h2">Overzicht Scans</div>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Scans</th>
                        <td> {{ $scans->count() }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Afgeronde scans</th>
                        @php
                            $completecount = 0;
                            foreach($scans as $scan) {
                                $complete = 1;
                                foreach($scan->answers as $answer) {
                                    if ($answer->answer == null) {
                                        $complete = 0;
                                    }
                                }
                                $completecount += $complete;
                            }
                        @endphp
                        <td>  {{ $completecount }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <div class="h2">Overzicht Groepen</div>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Groepen</th>
                        <td> {{ $groups->count() }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Groeps grootte</th>
                        @php
                            $groupcount = 0;
                            $participantcount = 0;
                            foreach($groups as $group){
                                $participantcount += $group->scans->count();
                                $groupcount ++;
                            }
                            $averageuserspergroup = round($participantcount / $groupcount, 1);
                        @endphp
                        <td> {{ $averageuserspergroup }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="h2">Overzicht Deelnemersveld</div>
            <table class="table">
                <tbody>
                    @foreach($instanties as $instantie)
                        <tr>
                            <th scope="row"> {{ $instantie->title }} </th>
                            <td> {{ $instantie->scans->count() }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="h2">Overzicht Criteria</div>
            <table class="table">
                <tbody>
                    <thead>
                        <tr>
                            <th scope="col">Criterium</th>
                            <th scope="col">Geselecteerd</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                    @foreach($questions as $question)
                        <tr>
                            <th scope="row"> {{ $question->title }} </th>
                            @php
                                $measurecount = 0;
                                foreach($question->measures as $measure) {
                                    if($measure->active) {
                                        $measurecount++;
                                    }
                                }
                            @endphp
                            <td> {{ $measurecount }} </td>
                            @php
                                $answercount = 0;
                                $answervalue = 0;
                                foreach($question->answers as $answer) {
                                    if($answer->answer !== null) {
                                        $answercount ++;
                                        $answervalue += $answer->answer;
                                    }
                                }
                                $answeraverage = null;
                                if($answercount != 0){
                                    $answeraverage = $answervalue / $answercount;
                                }
                            @endphp
                            <td> {{ number_format((float)$answeraverage, 1, '.', '') }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="h2">Overzicht Regio's</div>
            <table class="table">
                <tbody>
                    @foreach($districts as $district)
                        <tr>
                            <th scope="row"> {{ $district->name }} </th>
                            <td> {{ $district->scans->count() }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
