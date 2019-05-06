@extends('layouts.app', ['title' => 'Nieuwe Vergelijking: Instantie'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe vergelijking: Instantie</h5>
					<div class="card-body">
						<h5 class="card-title">Met welke instanties wil je je scan vergelijken?</h5>
						<span>Als je geen instanties kiest worden sessies met alle instanties getoond.</span>
						<select-instanties
							:instanties=" {{ json_encode($instanties) }} "
							:session=" {{ json_encode($session) }} "
						    :scan_id=" {{ $scan->id }} "
						>
						</select-instanties>
						
						@include('createcomparison.partials.createcomparisonprogress')
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection