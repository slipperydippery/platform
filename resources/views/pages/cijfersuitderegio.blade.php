@extends('layouts.app', ['title' => 'Cijfers uit jouw regio'])

@section('content')
	<div class="container">
		<div class="row ">
			<h1 class="">Cijfers uit jouw regio</h1>
			<p>Aenean commodo ligula eget dolor. Quisque id odio. Curabitur at lacus ac velit ornare lobortis. Morbi mollis tellus ac sapien. Quisque id mi.</p>

			<p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Donec venenatis vulputate lorem. Etiam imperdiet imperdiet orci. Nunc nec neque.</p>

		</div>
		
		<div class="row">
			<div class="col-md-12">
				<iframe scrolling="no" src="https://monitoraoj.nl/arbeidsregio1/#primary" class="iframe--monitor" style="border: 0px none; height: 1000px; width: 1180px;"></iframe>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection