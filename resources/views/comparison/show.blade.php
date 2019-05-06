@extends('layouts.scan', ['title' => 'Overzicht vergelijking'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle"> Resultaat vergelijking van jouw scan </h1>
	                <p>Hieronder kun je de resultaten bekijken van de sessies waarmee je vergelijkt. Klik op de tabbladen om de resultaten van de verschillende thema's te bekijken.</p>
	                <a href=" {{ route('dashboard') }} " class="btn btn-primary mb-4"> Terug naar de startpagina </a>
	            </div>
	        </div>
		</div>

		<div class="row">
			<div class="col-md-12">

				<ul class="nav nav-tabs" id="myTab" role="tablist">
					@foreach ($comparison->scan->scanmodel->themes as $theme)
						<li class="nav-item @if($loop->first) active @endif">
						<a class="nav-link" id="theme{{ $theme->order }}-tab" data-toggle="tab" href="#theme{{ $theme->order }}" role="tab" aria-controls="theme{{ $theme->order }}" aria-selected="false"> 
								@if ($loop->last)
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

					@foreach ($comparison->scan->scanmodel->themes as $theme)
						<div class="tab-pane fade @if($loop->first) show active @endif" id="theme{{ $theme->order }}" role="tabpanel" aria-labelledby="theme{{ $theme->order }}-tab">
							<div class="row">
								<compare-theme-results
									:comparison_id= " {{ $comparison->id }} " 
									:theme_id = " {{ $theme->id }} "
								>
								</compare-theme-results>
							</div>
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