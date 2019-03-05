@foreach (auth()->user()->scans as $scan)
    @if (! $scan->isowner())
        <div class="row p-1 bg-white text-secondary border-bottom">
            <div class="col-12 d-flex">
                @if ($scan->group)
                    <i class="material-icons md-inactive mr-2"> supervised_user_circle </i> 
                @else
                    <i class="material-icons md-inactive mr-2"> account_circle </i> 
                @endif
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