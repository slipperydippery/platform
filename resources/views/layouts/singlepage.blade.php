@extends('layouts.app', ['title' => $title])

@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	            <div class="page--title">
	                <h1 class="pagetitle"> @yield('pagetitle') </h1>
	                <p> @yield('pagesubtitle') </p>
	            </div>
	        </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="section__panel">
					<div class="section__panel--title">
						<h5> @yield('sectiontitle') </h5>
		                @yield('sectionsubtitle')
					</div>
					@hasSection('prevnext')
						<div class="row row__prevnext justify-content-between">
							@yield('prevnext')
						</div>
					@endif
					
				</div>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection