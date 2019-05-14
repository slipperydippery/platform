@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Verbeterpunten uitwerken thema {{ $theme->id }}: {{ $theme->title }}  </h1>
	                <p>Hieronder zie de verbeterpunten die je tijdens de sessie met elkaar hebt geselecteerd. Bespreek met de groep welke acties je per verbeterpunt kunt ondernemen. Vervolgens kan de beheerder de acties omschrijven en een trekker selecteren.</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="section__panel">
					@php
					    $measurecount = 0;
					@endphp

					@php
						$mainscan = $scan;
						if($scan->group) {
							$mainscan = $scan->group->scan;
						}
					@endphp
					@foreach ($mainscan->measures->where('active', true) as $measure)
						@if($measure->question->theme->id == $theme->id)
                            @php
                                $measurecount++;
                            @endphp
							<div class="section__panel--title">
								<h3>{!! $measure->question->title !!}</h3>
							</div>
							<div class="row">
								<div class="col-sm-3">
									Actie omschrijving:
								</div>
								<div class="col-sm-9 form-group">
									@if ($scan->group)
										<big-measure
											:measure_id = {{ $measure->id }}
											:is_manager=" {{ $is_manager = $scan->group->scan->id == $scan->id ? 1 : 0 }} "
										>
										</big-measure>
									@else
										<big-measure
											:measure_id = {{ $measure->id }}
											:is_manager=" 1 "
										>
										</big-measure>
									@endif
									
								</div>
							</div>
							@if ($scan->group)
								<div class="row">
									<div class="col-sm-3">
										Trekker:
									</div>
									<div class="col-sm-9">
										<frontrunner
											:measure_id = {{ $measure->id }}
											:group_id = {{ $measure->scan->group->id }}
											:is_manager=" {{ $is_manager = $scan->group->scan->id == $scan->id ? 1 : 0 }} "
										>
										</frontrunner>
									</div>
								</div>
							@endif
						@endif
					@endforeach
					@if ($measurecount == 0)
					    <p class="mt-4"><em>Geen verbeterpunt toegewezen</em></p>
					@endif
				</div>
			</div>
		</div>
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