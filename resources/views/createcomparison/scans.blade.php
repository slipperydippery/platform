@extends('layouts.app', ['title' => 'Nieuwe Vergelijking: Selecteer Scans'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe vergelijking: Selecteer sessies</h5>
					<div class="card-body">
						<h5 class="card-title">Selecteer sessies om mee te vergelijken</h5>
						<p>Hieronder zie je jouw scan, gevolgd door scans die voldoen aan de selecties die je hebt gemaakt. Klik op één of meerdere scans waarmee je jouw scan wilt vergelijken. Ben je blij met je selectie? Klik dan op 'Bevestig vergelijking' om scans met elkaar te vergelijken.</p>

						<select-compare-scans
							:scan=" {{ json_encode($scan) }} "
							:districts=" {{ json_encode($districts) }} "
							:instanties=" {{ json_encode($instanties) }} "
							:session=" {{ json_encode($session) }} "
						>
						</select-compare-scans>

						@include('createcomparison.partials.createcomparisonprogress')
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection