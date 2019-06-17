@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Regio in cijfers</h1>
	                <p>In het kaartje links ziet u per arbeidsmarktregio het percentage jongeren (16-27 jaar oud) die niet naar school gaan een geen baan hebben (de zogenoemde NEET-jongeren). Hoe donkerder de regio, hoe hoger het percentage. Als u met de muis over een regio gaat, ziet u het betreffende percentage en het aantal. Aan de rechterkant kunt u verdiepende informatie in beeld brengen: voorgeschiedenis van NEET-jongeren, relatief risico, VSV/JH.</p>

	                <p>Deze cijfers maken inzichtelijk hoe het er in uw regio voorstaat. Cijfers zijn niet het verhaal op zich, maar vooral deel van de voedingsbodem voor een goed gesprek. <i class="material-icons clickable md-36 md-36-24 bounce-fade-top" data-toggle="modal" data-target="#regioModal"> info </i> </p> 
					
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<iframe scrolling="no" src="https://monitoraoj.nl/arbeidsregio1/#primary" class="iframe--monitor" style="border: 0px none; height: 1000px; width: 1180px;"></iframe>
			</div>
		</div>

		<div class="modal fade" id="regioModal" tabindex="-1" role="dialog" aria-labelledby="regioModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-lg" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title" id="regioModalLabel"> Verdieping NEET-jongeren kaart </h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		            	<p>Welke voorgeschiedenis hebben de NEET-jongeren en welke voorgeschiedenis geeft een verhoogd risico om zonder baan en school te raken? Door op de nummers onderin te klikken, ziet u het volgende:</p>
		            	<ul>
			            	<li>Relatief risico: Hier is weergegeven hoeveel groter het risico is om zonder werk of baan te raken met een bepaalde voorgeschiedenis. Zo ziet u bijvoorbeeld dat in Nederland de jongeren die in praktijkonderwijs hebben gezeten, een 3,3 keer zo grote kans hebben om zonder school en baan te raken dan jongeren die niet in het praktijkonderwijs hebben gezeten.</li>
			            	<li>Voorgeschiedenis: hier ziet u hoe welk percentage van de jongeren zonder baan of school een bepaalde voorgeschiedenis hebben. Als u met de muis over een staaf gaat, ziet u het aantal jongeren met deze voorgeschiedenis. Zo ziet u bijvoorbeeld of een groot deel van de NEET-jongeren in uw regio afkomstig zijn van praktijkonderwijs.</li>
			            	<li>VSV/JH: In deze tabel wordt het aantal jongeren in de regio weergegeven dat op 1 oktober 2015 op de verschillende niveau&#39;s van het MBO zit met een geschiedenis als voortijdig schoolverlater of in jeugdhulp (ambulante jeugdhulp of daghulp)</li>
		            	</ul>
		            	<p>Als u op een regio klikt, ziet u de voorgeschiedenis en het relatief risico voor de jongeren binnen deze regio. Door op de NL-knop te drukken, gaat u weer terug naar de gegevens van Nederland. </p>
		            	<p>Voetnoot bij de grafiek: Geschiedenis in het onderwijs is beschikbaar vanaf 2010, geschiedenis in jeugdhulp vanaf 2012. We kunnen de voorgeschiedenis dus niet in beeld brengen voor alle jongeren tot 27 jaar oud. De gegevens in deze grafiek hebben betrekking op jongeren van 16 tot 22 jaar oud.</p>
		            	<p><em>Bron: resultaten zijn gebaseerd op eigen berekeningen van het Nederlands Jeugdinstituut op basis van niet-openbare microdata van het Centraal Bureau voor de Statistiek betreffende alle jongeren van 16-27 jaar oud, hun sociaal-economische categorie en hun achtergrond in onderwijs en jeugdzorg.</em></p>
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