@extends('layouts.scan', ['title' => 'Verbeterpunten uitwerken introductie'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Verbeterpunten uitwerken </h1>
	                <p>We gaan nu per thema de verbeterpunten uitwerken die in de voorgaande pagina's zijn geselecteerd en waarvoor al een aanzet is gemaakt. Bespreek met de groep welke acties je per verbeterpunt kunt ondernemen. Vervolgens kan de beheerder de acties omschrijven en een trekker selecteren.</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="card my-4">
					<div class="card-header bg-primary text-white">
						Betrekken we jongeren?
					</div>
					<div class="card-body text-center">
						<span>
							
							@php
								$mainscan = $scan;
								if( $scan->group ){
									$mainscan = $scan->group->scan;
								}
							@endphp
							<involve-youths-checkbox
								:scan = '{{ json_encode($mainscan) }}'
							>
							</involve-youths-checkbox>

							
						</span>
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