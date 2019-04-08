@extends('layouts.scan', ['title' => 'Sessie - thema ' . $theme->id . ' resultaten'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">
	                	Resultaten thema {{ $theme->id }}: {{ $theme->name }}
	                	@if ($theme->info)
	                		<i class="material-icons clickable muted h1" data-toggle="tooltip" data-placement="top" title=" {{ $theme->info }} "> info </i>
	                	@endif
	                </h1>
	            </div>
	        </div>
	        <div class="col d-flex">
	            <div class="flex-grow-1">
                    <p>Dit zijn de scores van de deelnemers. Bespreek met elkaar wat er uit springt en/of over welke onderwerpen sterk van mening wordt verschild. In het volgende scherm kunnen de belangrijkste twee of drie verbeterpunten worden benoemd.</p>
	            </div>
	            <div class="">
	            	<countdown date="600"></countdown>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="section__panel">
					<div class="section__panel--title">
						<h5>Resultaten</h5>
		                <span><em></em></span>
					</div>
k
					<div class="row">
						<scan-results
							:group_id = " {{ $scan->group->id }} " 
							:theme_id = " {{ $theme->id }} "
						>
						</scan-results>
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
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
              $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection