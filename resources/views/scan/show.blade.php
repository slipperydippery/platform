@extends('layouts.app', ['title' => 'Nieuwe Scan'])

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="pagetitle">Afgerond!</h1>
            </div>
            <p>Nullam quis ante. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Suspendisse potenti. In consectetuer turpis ut velit. Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor.</p>
            <a href=" # " class="btn btn-secondary">Bekijk resultaten</a>
            <a href=" # " class="btn btn-secondary">E-mail mij de actiepunten</a>
        </div>
	</div>
</div>
<div class="container-fluid bg-secondary shadow py-5 mt-4 mb-5">
	<div class="container">
		<div class="bd-example">
		  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
		      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		    </ol>
		    <div class="carousel-inner">
		      <div class="carousel-item active">
		      	<div class="row justify-content-center py-5">
		      		<div class="col-3">
				        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
				        <div class=" d-none d-md-block">
				          <h5>Second slide label</h5>
				          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				        </div>
		      		</div>
		      		<div class="col-3">
				        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
				        <div class=" d-none d-md-block">
				          <h5>Second slide label</h5>
				          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				        </div>
		      		</div>
		      		<div class="col-3">
				        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
				        <div class=" d-none d-md-block">
				          <h5>Second slide label</h5>
				          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				        </div>
		      		</div>
		      	</div>
		      </div>
		      <div class="carousel-item">
		      	<div class="row justify-content-center py-5">
		      		<div class="col-3">
				        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
				        <div class=" d-none d-md-block">
				          <h5>Second slide label</h5>
				          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				        </div>
		      		</div>
		      		<div class="col-3">
				        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
				        <div class=" d-none d-md-block">
				          <h5>Second slide label</h5>
				          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				        </div>
		      		</div>
		      		<div class="col-3">
				        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
				        <div class=" d-none d-md-block">
				          <h5>Second slide label</h5>
				          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				        </div>
		      		</div>
		      	</div>
		      </div>
		      <div class="carousel-item">
		      	<div class="row justify-content-center py-5">
		      		<div class="col-3">
				        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
				        <div class=" d-none d-md-block">
				          <h5>Second slide label</h5>
				          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				        </div>
		      		</div>
		      		<div class="col-3">
				        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
				        <div class=" d-none d-md-block">
				          <h5>Second slide label</h5>
				          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				        </div>
		      		</div>
		      		<div class="col-3">
				        <img src="/img/carousel2.jpg" class="d-block w-100" alt="/img/carousel2.jpg">	
				        <div class=" d-none d-md-block">
				          <h5>Second slide label</h5>
				          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				        </div>
		      		</div>
		      	</div>
		      </div>
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