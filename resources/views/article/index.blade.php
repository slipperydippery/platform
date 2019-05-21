@extends('layouts.scan', ['title' => 'Bewerk kennisbank artikelen'])

@section('content')
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle">Overzicht Kennisbank Artikelen</h1>
	                <p>Hieronder staan de artikelen voor de kennisbank. Hier kun je artikelen toevoegen of bewerken. </p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
                <a href=" {{ route('articletype.index') }} " class="btn btn-primary mb-4"> Bewerk item type's  </a> 
				<manage-articles
					:workarticles = " {{ $articles }} "
					:scanmodel = " {{ $scanmodel }} "
				>
				</manage-articles>
			</div>
		</div>
@stop


@section('additional-scripts')
@endsection