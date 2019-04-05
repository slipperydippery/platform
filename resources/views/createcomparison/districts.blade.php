@extends('layouts.app', ['title' => 'Nieuwe Scan: Gemeenten'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe groep: Gemeenten</h5>
					<div class="card-body">
						<h5 class="card-title">Voor welke gemeente(n) doe je deze scan?</h5>
						<form action="{{ route('createcomparison.storedistricts', $scan) }}" method="post" accept-charset="utf-8">
						    {{ csrf_field() }}
							@include('createcomparison.partials.districtsform', ['submittext' => 'Sla gemeenten op'])
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