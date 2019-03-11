@extends('layouts.scan', ['title' => 'Sessie - thema ' . $theme->id . ' introductie'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h3 class="pagetitle">Thema {{ $theme->order }}: </h3>
	                <p></p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">

                <div class="themeintro">
                	<h1 class="display-1">
                		{{ $theme->title }}
                		@if ($theme->info)
                			<i class="material-icons clickable muted display-1" data-toggle="tooltip" data-placement="top" title=" {{ $theme->info }} "> info </i>
                		@endif
                	</h1>
                </div>

			</div>
		</div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YgmIibSnZs0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
	</div>
@stop

@section('prevnext')
    <div class="row row__prevnext justify-content-between">
        <div class="col-md-4">
            <a href=" {{ url($previous) }} " class="btn btn-secondary btn-block btn__prevnext"><i class="material-icons"> navigate_before </i> vorige</a>
        </div>
        <div class="col-md-4">
            <a href=" {{ url($next) }} " class="btn btn-secondary btn-block btn__prevnext">volgende <i class="material-icons"> navigate_next </i></a>
        </div>
    </div>
@stop

@section('additional-scripts')
@endsection