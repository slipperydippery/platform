@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Overzicht resultaten van {{ $scan->title }} </h1>
	                <p>Hieronder kun je de resultaten van de sessie nogmaals bekijken. Klik op de tabbladen om door de thema's heen te schakelen.</p>
	                <a href=" {{ route('dashboard') }} " class="btn btn-primary"> Terug naar de startpagina </a>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="algemeenbeeld-tab" data-toggle="tab" href="#algemeenbeeld" role="tab" aria-controls="algemeenbeeld" aria-selected="true">Algemeen beeld</a>
					</li>
					@foreach ($scan->scanmodel->themes as $theme)
						<li class="nav-item">
						<a class="nav-link" id="theme{{ $theme->order }}-tab" data-toggle="tab" href="#theme{{ $theme->order }}" role="tab" aria-controls="theme{{ $theme->order }}" aria-selected="false"> {{ $theme->title }} </a>
					</li>
					@endforeach
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="algemeenbeeld" role="tabpanel" aria-labelledby="algemeenbeeld-tab">
						<algemeenbeeldresultaten
						    :workscan=" {{ $scan }} "
						    :scanmodel=" {{ $scan->scanmodel }} "
						    :loggedin=" {{ Auth::guest() ? 0 : Auth::user() }} "
						>
						</algemeenbeeldresultaten>
					</div>
					@if ($scan->group)
						@foreach ($scan->scanmodel->themes as $theme)
							<div class="tab-pane fade" id="theme{{ $theme->order }}" role="tabpanel" aria-labelledby="theme{{ $theme->order }}-tab">
								<scan-results
									:group_id = " {{ $scan->group->id }} " 
									:theme_id = " {{ $theme->id }} "
								>
								</scan-results>
							</div>
						@endforeach
					@else
						@foreach ($scan->scanmodel->themes as $theme)
							<div class="tab-pane fade" id="theme{{ $theme->order }}" role="tabpanel" aria-labelledby="theme{{ $theme->order }}-tab">
								<div class="row">
									<div class="col-sm-12 table table__results">
										<div class="row resultstable--row--questions">
											<div class="col-sm-2"></div>
											@foreach ($theme->questions as $question)
												<div class="col-sm-2">
													<strong>Vraag {{ $question->id }} <br></strong>
													<span data-toggle="tooltip" data-placement="top" title=" {{ $question->question }} ">{!! $question->title !!}</span>
												</div>
											@endforeach
										</div>
										<div class="row resultstable--row--average">
												<div class="col-sm-2 average">Gemiddeld</div>
											@foreach ($theme->questions as $question)
												<div class="col-sm-2">
													@if ($scan->group)
														<average-slider
															:scan_id=" {{ $scan->id }} "
															:group_id=" {{ $scan->group->id }} "
															:question_id=" {{ $question->id }} "
														>
														</average-slider>
													@else	
														@php
															$thisvalue = $scan->answers->where('question_id', $question->id)->first()->answer ? $scan->answers->where('question_id', $question->id)->first()->answer : "null";
														@endphp
														<result-slider
															:value=" {{ $thisvalue }} "
														>
														</result-slider>										
													@endif


												</div>
											@endforeach
										</div>
										
										<div class="row">
											<div class="col-sm-2"> Actiepunten - <em>steekwoorden</em></div>
											@foreach ($theme->questions as $question)
												<div class="col-sm-2">
													@if ($scan->group)
														<mini-measure
															:measure_id=" {{ $question->measures->where('scan_id', $scan->group->scan->id)->first()->id }} "
															:is_manager=" {{ $is_manager = $scan->group->scan->id == $scan->id ? 1 : 0 }} "
														>
														</mini-measure>
													@else
														<mini-measure
															:measure_id=" {{ $question->measures->where('scan_id', $scan->id)->first()->id }} "
															:is_manager=" 1 "
														>
														</mini-measure>
													@endif
												</div>	
											@endforeach
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
					
				</div>
			</div>
		</div>
@stop

@section('additional-scripts')
@endsection