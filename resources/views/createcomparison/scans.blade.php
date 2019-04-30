@extends('layouts.app', ['title' => 'Nieuwe Scan: Instantie'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe groep: Selecteer sessies</h5>
					<div class="card-body">
						<h5 class="card-title">Selecteer sessies om mee te vergelijken</h5>

						<select-compare-scans
							:scan=" {{ json_encode($scan) }} "
							:districts=" {{ json_encode($districts) }} "
							:instanties=" {{ json_encode($instanties) }} "
							:session=" {{ json_encode($session) }} "
						>
						</select-compare-scans>

						@include('creategroupscan.partials.creategroupprogress')
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection