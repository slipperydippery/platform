@extends('layouts.scan', ['title' => 'Nieuwe Scan'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Overzicht Kennisbank Thema's</h1>
	                <p>Hieronder staan de thema's voor de kennisbank. Hier kun je ook thema's toevoegen of bewerken. </p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<manage-articletypes
					:workarticletypes = " {{ $articletypes }} "
				>
				</manage-articletypes>
			</div>
		</div>
@stop


@section('additional-scripts')
@endsection