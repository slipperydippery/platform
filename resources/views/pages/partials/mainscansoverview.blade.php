<div class="accordion mb-4" id="accordionExample">
    <div class="card card--block">
        <div class="card-header position-relative" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <a href="#" class="stretched-link text-decoration-none">
                <h3 class="mb-0 block-title">
                        Wat is de Participatiescan?
                        <i class="material-icons float-right">
                            keyboard_arrow_down
                        </i>
                </h3>
            </a>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <p>De Participatiescan is een online analysetool met het doel om jongeren in een kwetsbare positie naar werk te begeleiden. Samen met netwerkpartners bekijk je de actuele situatie in jouw gemeente. Na het doorlopen van de scan heb je een concrete verbeteragenda. Wil je weten hoe het werkt? <a href="#" data-toggle="modal" data-target="#instructieModal">Klik hier.</a>  </p>
            </div>
        </div>
    </div>
</div>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-groups-tab" data-toggle="tab" href="#nav-groups" role="tab" aria-controls="nav-groups" aria-selected="true">Dit zijn je groepssessies</a>
        <a class="nav-item nav-link" id="nav-individual-tab" data-toggle="tab" href="#nav-individual" role="tab" aria-controls="nav-individual" aria-selected="false">
            @if ($thisgroup = Session::get('newsinglesessionflash'))
                <span  id="singlescan" data-toggle="popover" data-placement="top" title="Nieuwe sessie is gemaakt!" data-content="Je individuele sessie ({{ $thisgroup->title }}) kun je vinden in dit tabblad!">
                    Dit zijn je individuele scans
                </span>
            @else
                Dit zijn je individuele scans
            @endif
        </a>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-groups" role="tabpanel" aria-labelledby="nav-groups-tab">
    <div class="">
        <div class="col mt-4 d-flex justify-content-end">
            <join-with-code></join-with-code>
            <a href=" {{ route('creategroupscan.title') }} " class="btn btn-secondary">Maak een groepssessie aan</a>
        </div>
    </div>

    @foreach (auth()->user()->scans->sortByDesc('updated_at') as $scan)
        @if ($scan->group)
            <scan-overview
                :scan_id = " '{{ $scan->id }}' "
                :group_id = " '{{ $scan->group->id }}' "
                :user_id = " '{{ Auth::user()->id }}' "
            >
            </scan-overview>
            @component('components.editgroupcomponent', ['thisgroup' =>$scan->group])
            @endcomponent
            
            @foreach ($scan->group->scans as $thisscan)
                <portal to="modals">
                    @component('components.emailcomponent', ['thisgroup' => $scan->group])
                    @endcomponent
                </portal>
            @endforeach

        @endif
    @endforeach
  </div>
  
  <div class="tab-pane fade" id="nav-individual" role="tabpanel" aria-labelledby="nav-individual-tab">
    <div class="">
        <div class="col mt-4 d-flex justify-content-end">
            <a href=" {{ route('createsinglescan.title') }} " class="btn btn-secondary">Maak een individuele scan aan</a>
        </div>
    </div>
    @foreach (auth()->user()->scans->sortByDesc('updated_at') as $scan)
        @if (! $scan->group)
            <div class="py-2 my-4 bg-white text-secondary border shadow">
                <div class="col-12 pt-2">
                    <h4>
                        <a href=" {{ route('scan.start', $scan) }} " class="flex-grow-1 nowrap text-uppercase">{{ $scan->title }}</a> 
                        <a href=" {{ route('scan.edit', $scan) }} "><i class="material-icons float-right"> edit </i></a>
                    </h4>
                </div>
                <div class="col-12">
                    <strong>Gemeenten: </strong>
                    @foreach ($scan->districts as $district)
                        {!! $district->name !!}@if(! $loop->last),@endif
                    @endforeach
                </div>
                <div class="col-12 my-2 d-flex justify-content-end">
                    <a href=" {{ route('createcomparison.districts', $scan) }} " class="btn btn-outline-secondary btn-outline-secondary--nooutline btn-sm">Start vergelijking</a>
                    <a href=" {{ route('scan.start', $scan) }} " class="btn btn-secondary btn-sm">Start sessie</a>
                </div>
                <div class="col-12">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td scope="col"> {{ $scan->user->name }} </td>
                                <td scope="col"> {{ $scan->instantie->title }} </td>
                                <td scope="col"> {{ $scan->answercount() }} / {{ $scan->scanmodel->questioncount() }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-light pt-3 ">
                    @if ($scan->comparisons->count())
                        <div class="col-12">
                            @foreach ($scan->comparisons as $key=>$comparison)
                                <comparison-overview
                                    :workcomparison = " {{ json_encode($comparison) }} "
                                    :scan = " {{ $scan }} "
                                >
                                </comparison-overview>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>
        @endif
    @endforeach      
  </div>
</div>


