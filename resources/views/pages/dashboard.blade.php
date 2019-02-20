@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')

@foreach ($user->dashmessages as $dashmessage)
    @include('partials.dashmessage')
@endforeach

<div class="container container--page">
    <div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="pagetitle">Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="row mt-3">
    	{{-- main Scan stuff --}}
    	<div class="col-md-9">
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
                    <a href=" {{ route('createscan.start') }} " class="">+ Maak een nieuwe scan aan</a>
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
@endsection

@section('additional-scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
              $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection