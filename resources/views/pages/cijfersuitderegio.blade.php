@extends('layouts.app', ['title' => 'Cijfers uit jouw regio'])

@section('content')
	<div class="container">
		<div class="row ">
			<h1 class="">Cijfers uit jouw regio</h1>
			<p>In het kaartje links ziet u per arbeidsmarktregio het percentage jongeren (16-27 jaar oud) die niet naar school gaan een geen baan hebben (de zogenoemde NEET-jongeren). Hoe donkerder de regio, hoe hoger het percentage. Als u met de muis over een regio gaat, ziet u het betreffende percentage en het aantal. Aan de rechterkant kunt u verdiepende informatie in beeld brengen: voorgeschiedenis van NEET-jongeren, relatief risico, VSV/JH.</p>

            <p>Deze cijfers maken inzichtelijk hoe het er in uw regio voorstaat. Cijfers zijn niet het verhaal op zich, maar vooral deel van de voedingsbodem voor een goed gesprek. <i class="material-icons clickable md-36 md-36-24 bounce-fade-top" data-toggle="modal" data-target="#regioModal"> info </i> </p>
		</div>

		<div class="row">
			<div class="col-md-12">
				<iframe scrolling="no" src="https://neet-rate-risicos-arbeidsregio.nl/" class="iframe--monitor" style="border: 0px none; height: 1000px; width: 1180px;"></iframe>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection
