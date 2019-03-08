@extends('layouts.app', ['title' => 'Sessie - thema ' . $theme->id . ' resultaten'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">
	                	Verbeterpunten thema {{ $theme->id }}: {{ $theme->name }} 
	                	@if ($theme->info)
	                		<i class="material-icons clickable muted h1" data-toggle="tooltip" data-placement="top" title=" {{ $theme->info }} "> info </i>
	                	@endif
	                </h1>
	                <p>Selecteer de belangrijkste verbeterpunten en licht eventueel toe wat de concrete actiepunten zijn. Deze notities komen verderop in de sessie terug. Alleen de beheerder kan actiepunten aanvinken en notities maken.</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="section__panel">
					<div class="section__panel--title">
						<h5>Verbeterpunten</h5>
		                <span><em></em></span>
					</div>
					<div class="row">
						<div class="col-sm-12 table table__results">
							<div class="row">
								<div class="col-sm-2"></div>
								@foreach ($theme->questions as $question)
									<div class="col-sm-2">
										<strong>Vraag {{ $question->id }} <br></strong>
										<span data-toggle="tooltip" data-placement="top" title=" {{ $question->body }} ">{{ $question->title }}</span>
									</div>
								@endforeach
							</div>
							<div class="row resultstable--row--average">
									<div class="col-sm-2 average">Gemiddeld</div>
								@foreach ($theme->questions as $question)
									<div class="col-sm-2">

										<average-slider
											:scan_id=" {{ $scan->id }} "
											:question_id=" {{ $question->id }} "
										>
										</average-slider>

									</div>
								@endforeach
							</div>
							
							<div class="row">
								<div class="col-sm-2"> Actiepunten - <em>steekwoorden</em></div>
								@foreach ($theme->questions as $question)
									<div class="col-sm-2">
										<mini-measure
											{{-- :measure_id=" {{ $question->measures->where('scan_id', $scan->group->owner->id)->first()->id }} " --}}
											{{-- :is_manager=" {{ $is_manager = $scan->group->owner->id == $scan->id ? 1 : 0 }} " --}}
										>
										</mini-measure>
									</div>	
								@endforeach
							</div>
							<countdown date="300"></countdown>
						</div>
						</div>
					</div>
					
			</div>
		</div>
	</div>
@stop

@section('prevnext')
	<div class="row row__prevnext justify-content-between">
		<div class="col-md-4">
			<a href=" {{ url($previous) }} " class="btn btn-primary btn-block btn__prevnext"><i class="material-icons"> navigate_before </i> vorige</a>
		</div>
		<div class="col-md-4">
			<a href=" {{ url($next) }} " class="btn btn-primary btn-block btn__prevnext">volgende <i class="material-icons"> navigate_next </i></a>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection