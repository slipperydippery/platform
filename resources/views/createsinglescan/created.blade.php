@extends('layouts.app', ['title' => 'Nieuwe Scan: Klaar'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Klaar!</h5>
					<div class="card-body">
						<h5 class="card-title">Wat nu?</h5>
						<p>Je scan is nu klaar om mee aan de slag te gaan. Er zijn eigenlijk twee opties die je nu hebt: je kunt direct met je scan aan de slag, of je kunt naar je dashboard waar je scan ook staat.</p>
	
						<div class="text-right">
							<a href=" {{ route('dashboard') }} " class="btn btn-outline-primary btn-outline-primary--nooutline">Naar de startpagina</a>
							<a href=" {{ route('scan.start', $scan) }} " class="btn btn-secondary">Direct aan de slag</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>


@stop

@section('additional-scripts')
@endsection