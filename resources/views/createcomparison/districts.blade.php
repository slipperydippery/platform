@extends('layouts.app', ['title' => 'Nieuwe Vergelijking: Gemeenten'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe vergelijking: Gemeenten</h5>
					<div class="card-body">
						<h5 class="card-title">Met welke gemeente(n) wil je je scan vergelijken?</h5>
						<span class="subtitle mb-3 d-block">Als je geen gemeente kiest worden scans met alle gemeenten getoond.</span>

						<select-districts
							:session = " {{ json_encode($session) }} "
							:group = 2
							:scan_id = " '{{ $scan->id }}' "
						>
						</select-districts>

						@include('createcomparison.partials.createcomparisonprogress')
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection