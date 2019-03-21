@extends('layouts.app', ['title' => 'Nieuwe Scan: Klaar'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Klaar!</h5>
					<div class="card-body">
						<h5 class="card-title">Je doet nu mee aan de groepssessie</h5>
						<p>Je kunt nu meteen van start of naar de startpagina.</p>
	
						<div class="text-right">
							<a href=" {{ route('scan.start', $scan) }} " class="btn btn-outline-primary btn-outline-primary--nooutline">Ga meteen van start</a>
							<a href=" {{ route('dashboard') }} " class="btn btn-secondary">Naar de startpagina</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection