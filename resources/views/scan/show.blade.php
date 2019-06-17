@extends('layouts.app', ['title' => 'Overzicht sessie'])

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="pagetitle">Afgerond!</h1>
            </div>
            <p>Hieronder zie je een aantal links en artikelen die je kunnen helpen bij het uitvoeren van de verbeterpunten. Je kunt je resultaten ook bekijken en naar jezelf mailen.</p>
            <a href=" {{ route('scan.results', $scan) }} " class="btn btn-secondary">Bekijk resultaten</a>
            <a href=" {{ route('scan.measures', $scan) }} " class="btn btn-secondary">Bekijk verbeterpunten</a>
            <a href=" {{ route('scan.mailmeasures', $scan) }} " class="btn btn-secondary">E-mail mij de verbeterpunten</a>
            @if (! $scan->group)
	            <a href=" {{ route('createcomparison.districts', $scan) }} " class="btn btn-secondary">Vergelijk met andere scans</a>
            @endif
        </div>
	</div>
</div>
<div class="container-fluid bg-secondary shadow py-5 mt-4 mb-5">
	<div class="container">
		<h1 class="text-white text-center">Ook interessant voor jou:</h1>
		<div class="bd-example">
		  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
		    	@for ($chunck = 0; $chunck < ( $articles->count() / 3 ); $chunck++)
		    		@if ($chunck == 0)
						<li data-target="#carouselExampleCaptions" data-slide-to=" {{ $chunck }} " class="active"></li>
	    			@else
						<li data-target="#carouselExampleCaptions" data-slide-to=" {{ $chunck }} " class=""></li>
		    		@endif
		    	@endfor
		    </ol>
		    <div class="carousel-inner">
		    	@foreach($articles->chunk(3) as $chunk)
		    		@if ($loop->first)
						<div class="carousel-item active">
					@else
						<div class="carousel-item">
		    		@endif
						<div class="row justify-content-center py-5">
			    	        @foreach($chunk as $article)
								<div class="col-3">
							        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
							        <div class=" d-none d-md-block">
							          <h5> {!! $article->title !!} </h5>
							          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							        </div>
								</div>
			    	        @endforeach 
						</div>
					</div>
		    	@endforeach
		      
		    </div>
		    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		      <span class="carousel-control-next-icon" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
		</div>
	</div>
</div>



@stop


@section('additional-scripts')
@endsection