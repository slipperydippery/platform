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
			<div class="col-md-12">
				<div class="section__panel">
					<div class="section__panel--title">
						<h3>
							Betrekken wij jongeren?
							<i class="material-icons clickable md-36 md-36-24 bounce-fade-top" data-toggle="modal" data-target="#youthsModal"> info </i>
						</h3>
					</div>
					<div class="row">
						<div class="col-sm-3">
							Hoe ga je jongeren betrekken?
						</div>
						<div class="col-sm-9 form-group">

							<actionplan-youths-textarea
								:scan = '{{ json_encode($mainscan) }}'
							>
							</actionplan-youths-textarea>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="youthsModal" tabindex="-1" role="dialog" aria-labelledby="youthsModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="youthsModalLabel"> Hoe betrekken wij jongeren </h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		            	<p>Bekijk de volgende documenten om inspiratie op te doen over het betrekken van jongeren:</p>
		                <a href="/pdf/In_gesprek_met_Robin.pdf" target="_blank">In gesprek met Robin</a> <br>
		                <a href="/pdf/voorbeeld_persona_tess.pdf" target="_blank">In gesprek met Tess</a>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-primary" data-dismiss="modal">sluit</button>
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