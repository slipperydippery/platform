@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Algemeen beeld resultaten</h1>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				Hier een overzicht van de resultaten.

                <algemeenbeeldresultaten
                    :workscan=" {{ $scan }} "
                    :scanmodel=" {{ $scanmodel }} "
                    :loggedin=" {{ Auth::guest() ? 0 : Auth::user() }} "
                >
                </algemeenbeeldresultaten>
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