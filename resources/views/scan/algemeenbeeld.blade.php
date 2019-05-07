@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Algemeen beeld</h1>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card__question">
                    <div class="card-body">

                        <span class="card-text card-text__question"> 
			                <h5>Beoordeel de huidige gezamenlijke aanpak</h5>
			                <p>Kunt u een algemene indruk geven van hoe goed uw regio het volgens u doet als het gaat om het gezamenlijk goed begeleiden van jongeren in een kwetsbare positie van school naar werk. Nul is ‘heel slecht’ en tien is ‘perfect’. </p>
		            	</span>

                        
                        @php
                        	$loggedin = Auth::guest() ? 0 : 1;
                        @endphp
                        <algemeenbeeld 
                        	:workscan=" {{ $scan }} " 
                        	:loggedin=" {{ $loggedin }} "
                        >
                        </algemeenbeeld>
                        
                    </div>
                    <div class="card-footer">
	                    <p>Geef met een cijfer aan in hoeverre de stelling van toepassing is.</p>
                    </div>
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