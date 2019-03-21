@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Regio in cijfers</h1>
	                <p>stap 1</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<iframe scrolling="no" src="https://monitoraoj.nl/arbeidsregio1/#primary" class="iframe--monitor" style="border: 0px none; height: 1000px; width: 1180px;"></iframe>
			</div>
		</div>
@stop

@section('prevnext')
    <div class="row row__prevnext justify-content-between">
        <div class="col-md-4">
            <a href=" {{ route('scan.kennismaken', $scan) }} " class="btn btn-secondary btn-block btn__prevnext"><i class="material-icons"> navigate_before </i> vorige</a>
        </div>
        <div class="col-md-4">
            <a href=" {{ route('scan.algemeenbeeld', $scan) }} " class="btn btn-secondary btn-block btn__prevnext">volgende <i class="material-icons"> navigate_next </i></a>
        </div>
    </div>
@stop

@section('additional-scripts')
@endsection