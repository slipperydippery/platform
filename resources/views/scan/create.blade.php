@extends('layouts.app', ['title' => 'nieuwe scan'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Nieuwe scan zonder groep</h1>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('scan.store') }}" method="post" accept-charset="utf-8">
				    {{ csrf_field() }}
					@include('scan.partials.form', ['submittext' => 'Maak scan aan'])
				</form>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection