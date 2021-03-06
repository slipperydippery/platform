@extends('layouts.app', ['title' => 'Contact'])

@section('content')
	<div class="container">
		<div class="row ">
			<h1 class="">Contactgegevens</h1>

		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card-group mt-5">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title text-uppercase"> Algemene vragen </h5>
						</div>
						<div class="card-body">
							<p class="card-text">
								<address>
									<strong> 16-27 </strong> <br>
									Receptie <br>
									030-2306344 <br>
									<a href="mailto:info@16-27.nl">info@16-27.nl</a><br>
								</address>
							</p>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h5 class="card-title text-uppercase"> Tech support </h5>
						</div>
						<div class="card-body">
							<p class="card-text">
								<address>
									<strong> EMB AV </strong> <br>
									Susanne Meeuwissen <br>
									0641306310 <br>
									<a href="mailto:susanne@embav.nl">susanne@embav.nl</a><br>
								</address>
							</p>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h5 class="card-title text-uppercase"> Inhoudelijke vragen </h5>
						</div>
						<div class="card-body">
							<p class="card-text">
								<address>
									<strong> 16-27 </strong> <br>
									Receptie <br>
									030-2306344 <br>
									<a href="mailto:info@16-27.nl">info@16-27.nl</a><br>
								</address>
							</p>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection
