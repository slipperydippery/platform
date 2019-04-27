@extends('layouts.app', ['title' => 'Sluit aan bij sessie: Code'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Sluit aan bij een groep</h5>
					<div class="card-body">
						<h5 class="card-title">Voer je code in</h5>
						<form action="{{ route('joingroupscan.storecode') }}" method="post" accept-charset="utf-8">
						    {{ csrf_field() }}
							@include('joingroupscan.partials.storecodeform', ['submittext' => 'Voer code in'])
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection