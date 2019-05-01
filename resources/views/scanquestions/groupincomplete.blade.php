@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Niet alle groepsleden zijn klaar</h1>
	                <p>Nog niet iedereen is klaar met de sessie. Je kunt hier wachten tot dat iedereen klaar is of door gaan naar de overzichtspagina.</p>
	            </div>
	        </div>
		</div>
		@foreach ($incompletescans as $thisscan)
			<div class="row mb-4">
				<div class="col-md-12">
					<h3> {{ $thisscan->user->name }} </h3>
					@if ( ! $thisscan->algemeenbeeld)
						<a href=" {{ route('scan.algemeenbeeld', $thisscan) }} "> 0 - Beoordeel de huidige gezamenlijke aanpak </a> <br>
					@endif
					@foreach ($thisscan->answers as $answer)
						@if ($answer->created_at == $answer->updated_at)
							<a href=" {{ route('scanquestions.show', [$thisscan, $answer->question->theme, $answer->question]) }} ">{{ $answer->question->id }} - {!! $answer->question->title !!}</a> <br>
						@endif
					@endforeach
				</div>
			</div>
		@endforeach
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