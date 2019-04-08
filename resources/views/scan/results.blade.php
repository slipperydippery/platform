@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Overzicht resultaten van {{ $scan->title }} </h1>
	                <p>Hieronder kun je de resultaten van de sessie nogmaals bekijken. Klik op de tabbladen om door de thema's heen te schakelen.</p>
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
					@foreach ($scan->scanmodel->themes as $theme)
						<div class="tab-pane fade" id="theme{{ $theme->order }}" role="tabpanel" aria-labelledby="theme{{ $theme->order }}-tab">
							<scan-results
								:group_id = " {{ $scan->group->id }} " 
								:theme_id = " {{ $theme->id }} "
							>
							</scan-results>
						</div>
					@endforeach
				</div>
			</div>
		</div>
@stop

@section('additional-scripts')
@endsection