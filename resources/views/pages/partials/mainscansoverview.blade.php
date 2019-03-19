<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-groups-tab" data-toggle="tab" href="#nav-groups" role="tab" aria-controls="nav-groups" aria-selected="true">Dit zijn je groepssessies</a>
        <a class="nav-item nav-link" id="nav-individual-tab" data-toggle="tab" href="#nav-individual" role="tab" aria-controls="nav-individual" aria-selected="false">Dit zijn je individuele scans</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-groups" role="tabpanel" aria-labelledby="nav-groups-tab">
    @foreach (auth()->user()->scans as $scan)
        @if ($scan->group)
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


