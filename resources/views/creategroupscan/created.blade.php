@extends('layouts.app', ['title' => 'Nieuwe Scan: Klaar'])

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				<div class="card card--create">
					<h5 class="card-header bg-primary text-white">Klaar!</h5>
					<div class="card-body">
						<h5 class="card-title">Nodig je netwerkpartners uit</h5>
						<p>Weet je al precies wie je wilt uitnodigen? Stuur de deelnemers een email met de volgende code:</p>

						<div class="alert alert-primary" role="alert">
							{{ url('/') }}/{{ $group->code }}
						</div>

						<p class="page-highlight">
						    <span id="groupcode">{{ Request::root() }}/group/{{ $scan->group->id }}/createscan/{{ $scan->group->code }}</span> 
						    <copy-icon
						        copy_content=" {{ Request::root() }}/group/{{ $scan->group->id }}/createscan/{{ $scan->group->code }} "
						    >
						    </copy-icon>
						</p>

						<p>Je kunt ook gebruik maken van onze <a href="#">voorbeeld e-mail</a>.</p>

						<p>Verder hebben wij een handige tool om te inventariseren wie je het beste uit kunt nodigen. Heb je dit straks allemaal gedaan? Dan kan je vanuit de startpagina je scan beheren en later aan de slag gaan.</p>
	
						<div class="text-right">
							<a href=" {{ route('dashboard') }} " class="btn btn-outline-primary btn-outline-primary--nooutline">Naar de startpagina</a>
							<a href=" {{ route('dashboard') }} " class="btn btn-secondary">Wie zijn je netwerkpartners?</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection