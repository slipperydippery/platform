@extends('layouts.app', ['title' => 'nieuwe groep'])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
		                <h1 class="pagetitle">Nieuwe goep</h1>
	                <p>lorem ipsum</p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('group.store') }}" method="post" accept-charset="utf-8">
				    {{ csrf_field() }}
					@include('group.partials.form', ['submittext' => 'Maak groep aan'])
				</form>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection