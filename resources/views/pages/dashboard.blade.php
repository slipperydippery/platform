@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')

    <div class="hero">
        @if(Auth::check() && auth()->user()->scans->count())
            @include('pages.partials.heroscan')
        @else
            @include('pages.partials.herointro')
        @endif
    </div>

    <div class="container container--page">
        <div class="row">
            <div class="col-md-9">
                @if(Auth::check() && auth()->user()->scans->count())
                    include(partials.mainscansoverview)
                @else
                    @include('pages.partials.mainempty')
                @endif
                <div class="row">
                    <div class="col bg-white shadow-sm">
                        hier is een col
                    </div>
                </div>
            </div>
            <div class="col-md-3 main--sidebar">
                @include('pages.partials.sidebar')
            </div>
        </div>
    </div>




@if( false )
    @if ( ! auth()->user()->scans->count() )
        <div class="welcome">
            <img src="/img/hero_main_feet.jpg" alt="" class="img-fluid">
            <div class="container">
                <div class="row intro-block">
                    <div class="col-12">
                        <h2 class="mt-5 font-weight-light text-center"> Alles wat netwerkpartners nodig hebben om succesvol de handen ineen te slaan.</h2>
                        <div class="text-center pt-3 pb-3">
                            <a href="#" class="btn btn-secondary mx-auto bounce-fade-top">BEKIJK DE SCAN</a> <br>
                            <a href="/pdf/handleiding_participatiescan.pdf" data-toggle="modal" data-target="#exampleModal">
                                <span class="fineprint fineprint--welcome fade-in-fwd">Hoe werkt de scan?</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else

    <div class="container container--page">
        <div class="container-fluid">
            <img src="/img/hero_main_feet.jpg" alt="" class="img-fluid">
        </div>

        <div class="row mt-3">
            {{-- main Scan stuff --}}
            <div class="col-md-9 bg-white shadow-sm">
                    <a href=" {{ route('createscan.start') }} " class="">+ Maak een nieuwe scan aan</a>
                <div class="row mb-5">
                    <div class="col border shadow-sm">
                        <div class="row">
                            <div class="col-12 pt-2 border-bottom" >
                                <h6>Mijn Scans</h6>
                            </div>
                        </div>
                        @foreach (auth()->user()->scans as $scan)
                            @if (! $scan->isowner())
                                <div class="row p-1 bg-white text-secondary border-bottom">
                                    <div class="col-12 d-flex">
                                        @if ($scan->group)
                                            <i class="material-icons md-inactive mr-2"> supervised_user_circle </i> 
                                        @else
                                            <i class="material-icons md-inactive mr-2"> account_circle </i> 
                                        @endif
                                        <a href=" {{ route('scan.show', $scan) }} " class="flex-grow-1 mx-2 nowrap">{{ $scan->title }}</a>
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
                <div class="row mb-5">
                    <div class="col border shadow-sm">
                        <div class="row">
                            <div class="col-12 pt-2 border-bottom">
                                <h6>Mijn groepen</h6>
                            </div>
                        </div>
                        @foreach (auth()->user()->groups as $group)
                            <div class="row p-1 bg-white text-secondary border-bottom">
                                <div class="col-12 d-flex">
                                    <i class="material-icons md-inactive mr-2"> star </i> 
                                    <a href=" {{ route('group.show', $group) }} " class="flex-grow-1 mx-2 nowrap">{{ $group->title }}</a>
                                    <span class="mx-2 text-right">
                                        @foreach ($scan->districts as $district)
                                            <span class="badge badge-pill badge-secondary font-weight-light text-white">{{ $district->name }}</span>
                                        @endforeach
                                    </span>
                                    <span class="mx-2">
                                        <i class="material-icons md-inactive mr-2"> group </i> 
                                        {{ $group->usercount() }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <a href=" {{ route('group.create') }} " class=""> + Maak een nieuwe groep aan</a>
                    </div>
                </div>
                
            </div>

            {{-- Sidebar functions --}}
            <div class="col-md-3">
                <a href=" {{ route('introductiefilm') }} " title="">
                    <div class="card card__dashboard mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Instructiefilm</h5>
                            <img src="/img/films.jpg" alt="">
                        </div>
                    </div>
                </a>
                <div class="card card__dashboard mb-4" data-toggle="tooltip" data-placement="top" title="De kennisbank is nog in ontwikkeling">
                    <div class="card-body">
                        <h5 class="card-title disabled">Kennisbank</h5>
                        <img src="/img/book_disabled.jpg" alt="">
                    </div>
                </div>
                <div class="card card__dashboard mb-4" data-toggle="tooltip" data-placement="top" title="De kennisbank is nog in ontwikkeling">
                    <div class="card-body">
                        <h5 class="card-title disabled">Scans vergelijken</h5>
                        <img src="/img/book_disabled.jpg" alt="">
                    </div>
                </div>
                
            </div>
        </div>
            
    </div>
    @endif
@endif
@endsection

@section('additional-scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
              $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection