@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Plan een Vervolgafspraak</h1>
	                <p>Je hebt alle vragen al beantwoord. We adviseren om nu alvast een vervolgafspraak te maken om de uitgevoerde actiepunten om te zetten naar een werkagenda. De beheerder kan op de kalender een datum prikken zodat deze afspraak naar alle deelnemers van de groep kan worden gemaild.</p>
	                @if ($scan->group->followup)
						@if($scan->group->followup->datetime)
						    <p  class="scandate page-highlight page-highlight-secondary">Er is een vervolgsessie gepland op: {{ date('d-m-Y', strtotime($scan->group->followup->datetime)) }} om {{ date('H:i', strtotime($scan->group->followup->datetime)) }}</p>
		                @endif
					@else
					    <p  class="scandate page-highlight page-highlight-secondary">Er is nog geen vervolgafspraak gepland</p>
					@endif
	            </div>
	        </div>
		</div>
		@if($scan->id == $scan->group->scan->id)
			<div class="row">
				<div class="col-md-12">
					<div class="section__panel">
						<div class="section__panel--title">
							@if ($scan->group->followup)
								@if($scan->group->followup->datetime)
									<h5>Wijzig vervolgafspraak</h5>
								@endif
							@else
								<h5>Plan een vervolgafspraak</h5>
							@endif
			                <span><em></em></span>
						</div>

						<set-followup
							:group_id=" {{ $scan->group->id }} "
							:followup_id=" {{ $scan->group->followup->id }} "
							:beheerder=" {{ ( $scan->group->scan->id == $scan->id) ? 1 : 0  }} "
						>
						</set-followup>

					</div>
				</div>
			</div>
		@endif
@stop

@section('prevnext')
    <div class="row row__prevnext justify-content-between">
		<div class="col-md-4">
			<a href=" {{ url($previous) }} " class="btn btn-secondary btn-block btn__prevnext"><i class="material-icons"> navigate_before </i> vorige</a>
		</div>
		<div class="col-md-4">
			<a href=" {{ url($next) }} " class="btn btn-secondary btn-block btn__prevnext">volgende <i class="material-icons"> navigate_next </i></a>
		</div>
    </div>
@stop

@section('additional-scripts')
@endsection