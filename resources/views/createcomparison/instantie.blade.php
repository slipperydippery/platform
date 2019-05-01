@extends('layouts.app', ['title' => 'Nieuwe Vergelijking: Instantie'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe vergelijking: Instantie</h5>
					<div class="card-body">
						<h5 class="card-title">Met welke instantie wil je je scan vergelijken?</h5>
						<form action="{{ route('createcomparison.storeinstantie', $scan) }}" method="post" accept-charset="utf-8">
						    {{ csrf_field() }}
							@include('createcomparison.partials.instantieform', ['submittext' => 'Sla instantie op'])
						</form>
						
						@include('createcomparison.partials.createcomparisonprogress')
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection