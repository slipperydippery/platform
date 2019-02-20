@extends('layouts.singlepage', ['title' => 'scan aangemaakt' ])

@section('pagetitle', 'Je scan is aangemaakt')
@section('pagesubtitle', $scan->title . ' is aangemaakt')

@section('sectiontitle', 'Wat nu?')
@section('sectionsubtitle')
	<p><em>Je scan is aangemaakt en komt in het overzicht op je dashboard te staan. Je kunt direct aan de slag.  </em></p>
	<a href=" {{ route('scan.show', $scan) }} " class="btn btn-primary">Start de scan</a>
@endsection

@section('prevnext')
	<div class="col-md-4">
		<a href=" # " class="btn btn-primary btn-block btn__prevnext"><i class="material-icons"> navigate_before </i> vorige</a>
	</div>
	<div class="col-md-4 align-self-end">
		<a href=" # " class="btn btn-primary btn-block btn__prevnext">volgende <i class="material-icons"> navigate_next </i></a>
	</div>
@endsection


@section('additional-scripts')
@endsection