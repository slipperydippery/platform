<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-groups-tab" data-toggle="tab" href="#nav-groups" role="tab" aria-controls="nav-groups" aria-selected="true">Dit zijn je groepssessies</a>
        <a class="nav-item nav-link" id="nav-individual-tab" data-toggle="tab" href="#nav-individual" role="tab" aria-controls="nav-individual" aria-selected="false">Dit zijn je individuele scans</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-groups" role="tabpanel" aria-labelledby="nav-groups-tab">
    <div class="row">
        <div class="col mt-4">
            <a href=" {{ route('creategroupscan.title') }} " class="btn btn-secondary">Maak een groepssessie aan</a>
        </div>
    </div>


    @foreach (auth()->user()->scans as $scan)
        @if ($scan->group)
            <div class="row py-2 my-4 bg-white text-secondary border shadow">
                <div class="col-12 pt-2">
                    <h4>
                        <a href=" {{ route('scan.start', $scan) }} " class="flex-grow-1 mx-2 nowrap">{{ $scan->group->title }}</a> 
                        @if ($scan->group->scan->user->id == Auth::user()->id)
                            <a href=" {{ route('scan.edit', $scan) }} "><i class="material-icons float-right"> edit </i></a>
                        @endif
                    </h4>
                    <div class="d-flex mx-2">
                        <div class="flex-grow-1">
                            <p>
                                <em>
                                    Gemeenten: 
                                    @foreach ($scan->districts as $district)
                                        {!! $district->name !!}@if(! $loop->last),@endif
                                    @endforeach
                                    <br>
                                    Datum sessie: {{ date('d-m-Y', strtotime($scan->group->datetime)) }} om {{ date('H:i', strtotime($scan->group->datetime)) }}
                                    <br>
                                    Gebruik onderstaande link om meer mensen uit te nodigen:
                                    <br>
                                    <span class="text-nowrap">
                                        <span id="groupcode">{{ Request::root() }}/groep/{{ $scan->group->id }}/sluitaan/{{ $scan->group->code }}</span> 
                                        <copy-icon
                                            copy_content=" {{ Request::root() }}/groep/{{ $scan->group->id }}/sluitaan/{{ $scan->group->code }} "
                                        >
                                        </copy-icon>
                                    </span>
                                    <br>
                                    <a href="#"  data-toggle="modal" data-target="#voorbeeldmail{{ $scan->group->id }}">Bekijk voorbeeld email</a>
                                    @component('components.emailcomponent', ['thisgroup' => $scan->group])
                                    @endcomponent
                                </em>
                            </p>
                        </div>
                        <div class="align-self-end pb-3">
                            <a href=" {{ route('scanquestions.complete', $scan) }} " class="btn btn-outline-secondary btn-outline-secondary--nooutline btn-sm">Bekijk resultaten</a>
                            <a href=" {{ route('scan.start', $scan) }} " class="btn btn-outline-secondary btn-sm">Start sessie</a>
                        </div>
                    </div>

                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> {{ $scan->group->user->name }} </th>
                                <th scope="col">Beheerder</th>
                                <th scope="col"> {{ $scan->group->scan->answercount() }} / {{ $scan->scanmodel->questioncount() }} </th>
                                <th scope="col">
                                    @if (Auth::user()->id != $scan->group->user->id)
                                        <div class="dropdown float-right">
                                            <button class="btn btn-secondary dropdown-toggle dropdown-toggle__round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                <a class="dropdown-item" href="#">Stuur bericht</a>

                                            </div>
                                        </div>
                                    @endif
                                </th>
                            </tr>
                        </thead>
                        @foreach ($scan->group->scans as $thisscan)
                            @if ($thisscan->id !== $scan->group->scan->id)
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td> {{ $thisscan->user->name }} </td>
                                        <td> {{ $thisscan->instantie->title }} </td>
                                        <td> {{ $thisscan->answercount() }} / {{ $scan->scanmodel->questioncount() }} </td>
                                        <td>
                                            @if ($thisscan->user->id != Auth::user()->id)
                                                <div class="dropdown float-right">
                                                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle__round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                        <a class="dropdown-item" href="#">Stuur bericht</a>

                                                        @if (Auth::user()->id == $scan->group->user->id)
                                                            <form action="{{ route('managegroupscan.promoteuser', $scan->group) }}" method="post" accept-charset="utf-8" id="promootform{{ $thisscan->id }}">
                                                                {{ csrf_field() }}
                                                                <!-- Hidden group_id Type Form Input -->
                                                                <input type="hidden" id="group_id" name="group_id" value=" {{ $thisscan->group->id }} ">
                                                                <!-- Hidden scan_id Type Form Input -->
                                                                <input type="hidden" id="scan_id" name="scan_id" value=" {{ $thisscan->id }} ">
                                                                    
                                                            </form>
                                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('promootform{{ $thisscan->id }}').submit(); return false;">Promoot tot eigenaar</a>

                                                            <form action="{{ route('scan.destroy' , $thisscan)}}" method="POST">
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                {{ csrf_field() }}

                                                                <button type="submit" class="dropdown-item">Verwijder deze scan</button>
                                                            </form>
                                                        @endif
                                        
                                                    </div>
                                                </div>
                                            @else
                                                <button type="button" class="close mr-2" aria-label="Close" data-toggle="modal" data-target="#confirmdelete{{ $thisscan->id }}">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                                @component('components.deleteconfirm', ['thisscan' => $thisscan])
                                                @endcomponent

                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            @endif
                        @endforeach
                    </table>

                </div>
            </div>
        @endif
    @endforeach
      
  </div>
  <div class="tab-pane fade" id="nav-individual" role="tabpanel" aria-labelledby="nav-individual-tab">
    <div class="row">
        <div class="col mt-4">
            <a href=" {{ route('createsinglescan.title') }} " class="btn btn-secondary">Maak een individuele scan aan</a>
        </div>
    </div>
    @foreach (auth()->user()->scans as $scan)
        @if (! $scan->group)
            <div class="row py-2 my-4 bg-white text-secondary border shadow">
                <div class="col-12">
                    <h4>
                        <a href=" {{ route('scan.start', $scan) }} " class="flex-grow-1 mx-2 nowrap">{{ $scan->title }}</a> 
                        <a href=" {{ route('scan.edit', $scan) }} "><i class="material-icons float-right"> edit </i></a>
                    </h4>

                    <div class="row">
                        <div class="col">
                            <p>
                                <em>
                                    Gemeenten: 
                                    @foreach ($scan->districts as $district)
                                        {!! $district->name !!}@if(! $loop->last),@endif
                                    @endforeach
                                    <br>
                                    Datum sessie: {{ date('d-m-Y', strtotime($scan->datetime)) }} om {{ date('H:m', strtotime($scan->datetime)) }}
                                </em>
                            </p>
                        </div>
                        <div class="col">
                            <a href=" {{ route('createcomparison.districts', $scan) }} " class="btn btn-outline-secondary btn-outline-secondary--nooutline btn-sm">Start vergelijking</a>
                            <a href=" {{ route('scan.start', $scan) }} " class="btn btn-outline-secondary btn-sm">Start sessie</a>
                        </div>
                    </div>

                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td scope="col">1</td>
                                <td scope="col"> {{ $scan->user->name }} </td>
                                <td scope="col"> {{ $scan->instantie->title }} </td>
                                <td scope="col"> {{ $scan->answercount() }} / {{ $scan->scanmodel->questioncount() }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endforeach      
  </div>
</div>


