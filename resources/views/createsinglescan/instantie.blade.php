@extends('layouts.app', ['title' => 'Nieuwe Scan'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Welke instantie vertegenwoordig je tijdens de scan</h1>
	                <p>stap 2</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('createsinglescan.storeinstantie') }}" method="post" accept-charset="utf-8">
				    {{ csrf_field() }}
					@include('createsinglescan.partials.instantieform', ['submittext' => 'Bevestig instantie'])
				</form>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection