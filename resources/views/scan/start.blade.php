@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">{{ $scan->title }}</h1>
	                <p class="pagesubtitle text-secondary">We gaan van start</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				Als de scan actief is ga je hier meteen van start. Anders kun je nu niet verder. Je kunt wel een scan voor jezelf maken. Als dit een solo scan is dan moet je hier soweiso niet komen. <a href=" {{ route('createsinglescan.name') }} ">Maak een losse scan aan</a>
				<br >

			</div>
		</div>

		<div class="row">
			<div class="col text-center">
				<a href=" {{ route('scan.kennismaken', $scan) }} " class="btn btn-primary btn-lg mt-5"> <i class="material-icons"> lock </i> Ontrendel de groep</a>
			</div>
		</div>
	</div>
@stop



@section('additional-scripts')
@endsection