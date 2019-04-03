@extends('layouts.app', ['title' => 'Nieuwe Scan: Instantie'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Nieuwe sessie: Instantie</h5>
					<div class="card-body">
						<h5 class="card-title">Welke instantie vertegenwoordige je tijdens deze scan?</h5>
						<form action="{{ route('createsinglescan.storeinstantie') }}" method="post" accept-charset="utf-8">
						    {{ csrf_field() }}
							@include('createsinglescan.partials.instantieform', ['submittext' => 'Sla instantie op'])
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