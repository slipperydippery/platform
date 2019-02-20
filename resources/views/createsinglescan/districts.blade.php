@extends('layouts.app', ['title' => 'Nieuwe Scan'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Voor welke regio maak je de scan?</h1>
	                <p>stap 3</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('createsinglescan.storedistricts') }}" method="post" accept-charset="utf-8">
				    {{ csrf_field() }}
					@include('createsinglescan.partials.districtsform', ['submittext' => 'Bevestig regios'])
				</form>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection