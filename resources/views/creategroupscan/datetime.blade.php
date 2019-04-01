@extends('layouts.app', ['title' => 'Nieuwe Scan: Datum'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe groep: Datum</h5>
					<div class="card-body">
						<h5 class="card-title">Wanneer gaat de groepssessie plaatsvinden?</h5>
						<form action="{{ route('creategroupscan.storedatetime') }}" method="post" accept-charset="utf-8">
						    {{ csrf_field() }}
							@include('creategroupscan.partials.datetimeform', ['submittext' => 'Sla datum op'])
						</form>
						@include('creategroupscan.partials.creategroupprogress')
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection