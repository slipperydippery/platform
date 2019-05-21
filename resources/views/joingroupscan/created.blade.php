@extends('layouts.app', ['title' => 'Nieuwe Scan: Klaar'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Klaar!</h5>
					<div class="card-body">
						<h5 class="card-title">Je doet nu mee aan de groepssessie</h5>

						@if ($scan->group->unlocked)
							<p>Je kunt nu meteen van start of naar de startpagina.</p>
						@else
							<p>Je doet nu mee aan de groepssessie, maar de groep is nog vergrendeld. Je kunt van start gaan als de beheerder deze vrijgeeft.</p>
							<p>Ben je al erg benieuwd hoe de sessie er uit komt te zien? Dan kun je al wel een individuele scan aanmaken en die doorlopen. De resultaten hiervan kan je ook meteen vergelijken met andere scans om te zien waar jij staat.</p>
						@endif
	
						<div class="text-right">
							@if ($scan->group->unlocked)
								<a href=" {{ route('scan.start', $scan) }} " class="btn btn-outline-primary btn-outline-primary--nooutline">Ga meteen van start</a>
							@else
								<a href=" {{ route('createsinglescan.title') }} " class="btn btn-outline-primary btn-outline-primary--nooutline">Maak een individuele scan aan</a>
							@endif
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