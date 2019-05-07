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
                <p>De Participatiescan is een online kennis- en procestool. Via een resultaatgerichte analyse- en actiesessie ondersteunt de tool je om te komen tot een heldere werkagenda. Een lokaal/regionaal actieplan voor effectieve samenwerking voor het naar werk begeleiden van jongeren waarbij de focus ligt op werk en talent, de kwaliteit van begeleiding, effectieve samenwerking en overige randvoorwaarden. Onderzoek toont aan dat dit de belangrijkste succesfactoren zijn voor kansvergroting op de arbeidsmarkt. Met behulp van de Participatiescan wordt tijdens de analyse- en verbetersessie door jou en jouw netwerkpartners de huidige aanpak gelegd naast twintig op onderzoek gebaseerde kwaliteitsnormen. Dit mondt automatisch uit in een selectie van concrete actie- en verbeterpunten waar jullie mee aan de slag gaan. Ook biedt de Participatiescan een schat aan informatie over tools, goede praktijkvoorbeelden, cijfers, en tips om  jongeren in een kwetsbare positie succesvol te begeleiden naar de arbeidsmarkt.</p>
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
                :scan_id = " {{ $scan->id }} "
                :group_id = " {{ $scan->group->id }} "
                :user_id = " {{ Auth::user()->id }} "
            >
            </scan-overview>
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
                    <a href=" {{ route('scan.start', $scan) }} " class="btn btn-outline-secondary btn-sm">Start sessie</a>
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
                @if ($scan->comparisons)
                    <div class="col-12">
                        <h4>Gemaakte vergelijkingen:</h4>
                        @foreach ($scan->comparisons as $key=>$comparison)
                            <a href=" {{ route('comparison.show', $comparison) }} "> 
                                @if ($comparison->title)
                                    {{ $comparison->title }}
                                @else
                                Vergelijking met {{ $comparison->scan->title }} #{{ $key + 1 }}
                                @endif
                            </a> <br>
                        @endforeach

                    </div>
                @endif
            </div>
        @endif
    @endforeach      
  </div>
</div>


