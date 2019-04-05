@extends('layouts.app', ['title' => 'Nieuwe Scan: Instantie'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe groep: Selecteer sessies</h5>
					<div class="card-body">
						<h5 class="card-title">Selecteer sessies om mee te vergelijken</h5>
						hier een lijst
						@foreach ($scans as $thisscan)
							<p>{{ $thisscan->title }} </p>
						@endforeach
						@include('creategroupscan.partials.creategroupprogress')
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection