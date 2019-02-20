@extends('layouts.app', ['title' => 'Nieuwe Scan'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Geef je scan een naam</h1>
	                <p>stap 1</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('createsinglescan.storename') }}" method="post" accept-charset="utf-8">
				    {{ csrf_field() }}
					@include('createsinglescan.partials.nameform', ['submittext' => 'sla naam op'])
				</form>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection