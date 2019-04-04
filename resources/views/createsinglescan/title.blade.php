@extends('layouts.app', ['title' => 'Nieuwe Scan: Naam'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe groep: Naam</h5>
					<div class="card-body">
						<h5 class="card-title">Geef je groep een naam</h5>
						<form action="{{ route('createsinglescan.storetitle') }}" method="post" accept-charset="utf-8">
						    {{ csrf_field() }}
							@include('createsinglescan.partials.titleform', ['submittext' => 'sla naam op'])
						</form>
						@include('createsinglescan.partials.createsingleprogress')
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection