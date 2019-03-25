@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Niet alle vragen zijn beantwoord!</h1>
	                <p>Je hebt nog niet alle vragen al beantwoord. We adviseren om dit wel te doen. Hieronder vind je links naar de vragen die nog niet zijn beantwoord. Wil je de sessie alsnog als compleet markeren, dan kan dat ook, en vallen we je met deze pagina niet meer lastig!</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@if ( ! $scan->algemeenbeeld)
					<a href=" {{ route('scan.algemeenbeeld', $scan) }} "> 0 - Beoordeel de huidige gezamenlijke aanpak </a> <br>
				@endif
				@foreach ($scan->answers as $answer)
					@if ($answer->created_at == $answer->updated_at)
						<a href=" {{ route('scanquestions.show', [$scan, $answer->question->theme, $answer->question]) }} ">{{ $answer->question->id }} - {!! $answer->question->title !!}</a> <br>
					@endif
				@endforeach
				<br>
				<a href=" {{ route('scanquestions.markcomplete', $scan) }} " class="btn btn-primary"> Markeer alsnog als compleet </a> <br>
				<span class="fineprint"> Je kan de sessie altijd opnieuw doen. </span>
			</div>
		</div>
@stop

@section('prevnext')
    <div class="row row__prevnext justify-content-between">
		<div class="col-md-4">
			<a href=" {{ url($previous) }} " class="btn btn-secondary btn-block btn__prevnext"><i class="material-icons"> navigate_before </i> vorige</a>
		</div>
		<div class="col-md-4">
			<a href=" {{ route('scan.show', $scan) }} " class="btn btn-secondary btn-block btn__prevnext">volgende <i class="material-icons"> navigate_next </i></a>
		</div>
    </div>
@stop

@section('additional-scripts')
@endsection