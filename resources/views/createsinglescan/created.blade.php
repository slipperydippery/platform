@extends('layouts.app', ['title' => 'Nieuwe Scan'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Scan is aangemaakt</h1>
	                <p>Volgende stappen</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="section__panel">
					<div class="section__panel--title">
						<h5>Wat nu?</h5>
		                <span><em>Je scan is nu klaar om mee aan de slag te gaan. Er zijn eigenlijk twee opties die je nu hebt: je kunt direct met je scan aan de slag, of je kunt naar je dashboard waar je scan ook staat. </em></span>
					</div>
					<div class="row my-5">
						<div class="col-sm-6">
							<a href=" {{ route('scan.start', $scan) }} " class="btn btn-block btn-secondary">Direct aan de slag</a>
						</div>
						<div class="col-sm-6">
							<a href=" {{ route('dashboard') }} " class="btn btn-block btn-secondary">Naar mijn dashboard</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection