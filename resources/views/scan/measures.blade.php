@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Overzicht verbeterpunten van {{ $scan->title }} </h1>
	                <p>Hieronder kun je de resultaten van de sessie nogmaals bekijken. Klik op de tabbladen om door de thema's heen te schakelen.</p>
	                <a href=" {{ route('scan.show', $scan) }} " class="btn btn-primary"> Terug overzicht scan </a>
	                <a href=" {{ route('dashboard') }} " class="btn btn-primary"> Terug naar de startpagina </a>
	            </div>
	        </div>
		</div>
		<div class="row mt-4">
			<div class="col-md-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					@foreach ($scan->scanmodel->themes as $theme)
						<li class="nav-item">
						<a class="nav-link " id="theme{{ $theme->order }}-tab" data-toggle="tab" href="#theme{{ $theme->order }}" role="tab" aria-controls="theme{{ $theme->order }}" aria-selected="false"> 
							@if ($loop->first)
								<span  id="tabexplain" data-toggle="popover" data-placement="top" title="Bekijk alle thema's" data-content="Klik op een tabblad om de resultaten van dat thema te bekijken">
								    {{ $theme->title }} 
								</span>
							@else
								{{ $theme->title }} 
							@endif
						</a>
					</li>
					@endforeach
				</ul>
				<div class="tab-content" id="myTabContent">
					@foreach ($scan->scanmodel->themes as $theme)
						@if($loop->first)
							<div class="tab-pane fade mt-3 show active" id="theme{{ $theme->order }}" role="tabpanel" aria-labelledby="theme{{ $theme->order }}-tab">
						@else
							<div class="tab-pane fade mt-3" id="theme{{ $theme->order }}" role="tabpanel" aria-labelledby="theme{{ $theme->order }}-tab">
						@endif
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
													:is_manager=" 0 "
												>
												</big-measure>
											@else
												<big-measure
													:measure_id = {{ $measure->id }}
													:is_manager=" 0 "
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
													:measure_id = "{{ $measure->id }}"
													:group = "{{ json_encode($scan->group) }}"
													:is_manager=" 0 "
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
					@endforeach
					
				</div>
			</div>
		</div>
@stop

@section('additional-scripts')

	<script>
	    $(function () {
	      $('[data-toggle="popover"]').popover()
	    })
        $('.popover-dismiss').popover({
          trigger: 'focus'
        })
        $(document).ready( () => {
            $('#tabexplain').popover('show')
        } )
        $(document).click( () => {
            $('#tabexplain').popover('hide');
            $('#tabexplain').popover('disable');
        } )
    </script>
@endsection