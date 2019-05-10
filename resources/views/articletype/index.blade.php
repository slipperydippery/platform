@extends('layouts.scan', ['title' => 'Bewerk Kennisbank themas'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Overzicht Kennisbank Item Type's</h1>
	                <p>Hieronder staan de item type's voor de kennisbank. Hier kun je ook item types toevoegen of bewerken. </p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-10 offset-md-1">
                <a href=" {{ route('article.index') }} " class="btn btn-primary mb-4"> Bewerk kennisbank artikelen </a> 
				<manage-articletypes
					:workarticletypes = " {{ $articletypes }} "
				>
				</manage-articletypes>
			</div>
		</div>
@stop


@section('additional-scripts')
@endsection