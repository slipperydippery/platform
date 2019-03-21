<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-groups-tab" data-toggle="tab" href="#nav-groups" role="tab" aria-controls="nav-groups" aria-selected="true">Dit zijn je groepssessies</a>
        <a class="nav-item nav-link" id="nav-individual-tab" data-toggle="tab" href="#nav-individual" role="tab" aria-controls="nav-individual" aria-selected="false">Dit zijn je individuele scans</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-groups" role="tabpanel" aria-labelledby="nav-groups-tab">
    <div class="row">
        <div class="col py-2">
            <a href=" {{ route('creategroupscan.title') }} " class="btn btn-secondary">Maak nog een groupssessie aan</a>
        </div>
    </div>


    @foreach (auth()->user()->scans as $scan)
        @if ($scan->group)
            <div class="row py-2 my-5 bg-white text-secondary border shadow">
                <div class="col-12">
                    <h4><a href=" {{ route('scan.start', $scan) }} " class="flex-grow-1 mx-2 nowrap">{{ $scan->group->title }}</a> </h4>
                    <div class="row">
                        <div class="col">
                            <p>
                                <em>
                                    Gemeenten: 
                                    @foreach ($scan->districts as $district)
                                        {{ $district->name }}@if(! $loop->last),@endif
                                    @endforeach
                                    <br>
                                    Datum sessie: {{ date('d-m-Y', strtotime($scan->group->datetime)) }} om {{ date('H:m', strtotime($scan->group->datetime)) }}
                                    <br>
                                    <span class="text-nowrap">
                                        <span id="groupcode">{{ Request::root() }}/groep/{{ $scan->group->id }}/sluitaan/{{ $scan->group->code }}</span> 
                                        <copy-icon
                                            copy_content=" {{ Request::root() }}/groep/{{ $scan->group->id }}/sluitaan/{{ $scan->group->code }} "
                                        >
                                        </copy-icon>
                                    </span>
                                </em>
                            </p>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-outline-secondary btn-outline-secondary--nooutline btn-sm">Bekijk resultaten</a>
                            <a href=" {{ route('scan.start', $scan) }} " class="btn btn-outline-secondary btn-sm">Start sessie</a>
                        </div>
                    </div>
                    {{ $scan->group->scan->user->name }}

                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> {{ $scan->group->user->name }} </th>
                                <th scope="col">Beheerder</th>
                                <th scope="col"> {{ $scan->group->scan->answercount() }} / {{ $scan->scanmodel->questioncount() }} </th>
                                <th scope="col"> </th>
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
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Stuur bericht</a>
                                                    <form action="{{ route('managegroupscan.promoteuser') }}" method="post" accept-charset="utf-8" id="promootform{{ $thisscan->id }}">
                                                        {{ csrf_field() }}
                                                        <!-- Hidden group_id Type Form Input -->
                                                        <input type="hidden" id="group_id" name="group_id" value=" {{ $thisscan->group->id }} ">
                                                        <!-- Hidden scan_id Type Form Input -->
                                                        <input type="hidden" id="scan_id" name="scan_id" value=" {{ $thisscan->id }} ">
                                                            
                                                    </form>
                                                    <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('promootform{{ $thisscan->id }}').submit(); return false;">Promoot tot eigenaar</a>

                                        
                                                    <a class="dropdown-item" href="#">Verwijder uit sessie</a>
                                                </div>
                                            </div>
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
    @foreach (auth()->user()->scans as $scan)
        @if (! $scan->group)
            <div class="row p-1 bg-white text-secondary border-bottom">
                <div class="col-12 d-flex">
                    <a href=" {{ route('scan.start', $scan) }} " class="flex-grow-1 mx-2 nowrap">{{ $scan->title }}</a>
                    <span class="mx-2 text-right">
                        @foreach ($scan->districts as $district)
                            <span class="badge badge-pill badge-secondary font-weight-light text-white">{{ $district->name }}</span>
                        @endforeach
                    </span>
                    <span class="mx-2 nowrap"> {{ $scan->answercount() }} /15</span>
                </div>
            </div>
        @endif
    @endforeach      
  </div>
</div>


