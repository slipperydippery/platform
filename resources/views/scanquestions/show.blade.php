@extends('layouts.scan', ['title' => 'Sessie - vraag ' . $question->id])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">
	                	Thema {{ $theme->id }}: {{ $theme->title }}
	                </h1>
	            </div>
	        </div>
		</div>
		<div class="row">	
			<div class="col-md-12">	
				<div class="card card__question shadow">
                    <div class="card-body">
                        <h5 class="card-title">Vraag {{ $question->id }}/20 </h5>

                        <span class="card-text card-text__question"> 
			                <h5> {!! $question->question !!} <i class="material-icons clickable md-36 md-36-24 bounce-fade-top" data-toggle="modal" data-target="#justificationModal"> info </i></h5>
		            	</span>

                        <scan-slider
	                        :nvt=" {{ $question->nvt }} "
                        	:answer_id=" {{ $answer->id }} "
                        >
                        </scan-slider>
                        
                    </div>
                    <div class="card-footer">
	                    <p class="text-center">Geef met een cijfer antwoord op de vraag of stel de schuif in op de juiste waarde.</p>
                    </div>
				</div>
			</div>
		</div>
	</div>

	@if ($question->popup)
		<div class="modal fade" id="questionpopup" tabindex="-1" role="dialog" aria-labelledby="questionpopupLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="questionpopupLabel"> {{ $question->popup->title }} </h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		                {{ $question->popup->body }}
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-primary" data-dismiss="modal">sluit</button>
		            </div>
		        </div>
		    </div>
		</div>

	@endif

	<!-- Modal -->
	<div class="modal fade" id="justificationModal" tabindex="-1" role="dialog" aria-labelledby="justificationModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="justificationModalLabel"> {!! $question->question !!} </h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                {!! $question->justification !!}
	                <div class="alert alert-danger alert--scanfactor" role="alert">
		                <strong>Risocofactor:</strong> {!! $question->riskfactor !!}
	                </div>
	                <div class="alert alert-success alert--scanfactor" role="alert">
						<strong>Succesfactor:</strong> {!! $question->successfactor !!}
	                </div>
	                <a href="/img/Tips voor het gesprek.jpg" target="_blank">
	                <a href="/pdf/Handleiding digitale gesprekshulp.pdf" class="btn"> Lees de handleiding</a>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
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
<script>
	$('document').ready(function(){
		$('#questionpopup').modal('show')
	});
</script>
@endsection