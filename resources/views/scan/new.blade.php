@extends('layouts.app', ['title' => 'Nieuwe Scan'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Nieuwe Scan</h1>
	                <p>Samen of alleen</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="section__panel">
					<div class="section__panel--title">
						<h5>Wil je je scan aan een bestaande groep koppelen?</h5>
		                <span><em>Wil je de scan alleen maken? Of ga je samen met netwerkpartners aan de slag? Als je samen met je netwerkpartners aan de slag wilt heb je wellicht een uitnodiging ontvangen in je mailbox. Daar kun je de link volgen om direct een scan aan te maken die is gekoppeld aan de groep. Je kunt hieronder ook samen met een groep aan de slag gaan, en van daaruit een verzoek sturen naar de betreffende groep.</em></span>
					</div>
					<div class="row my-5">
						<div class="col-sm-6">
							<a href=" {{ route('scan.create') }} " class="btn btn-block btn-secondary">Ik wil de scan alleen maken</a>
						</div>
						<div class="col-sm-6">
							<a href=" {{ route('scan.createwithgroup') }} " class="btn btn-block btn-secondary">Ik ga samen met een groep aan de slag</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection