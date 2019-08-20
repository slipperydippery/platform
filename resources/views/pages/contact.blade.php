@extends('layouts.app', ['title' => 'Contact'])

@section('content')
	<div class="container">
		<div class="row ">
			<h1 class="">Contact gegevens</h1>

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
									<strong> Nederlands jeugdinstituut </strong> <br>
									Receptie <br>
									030-2306344 <br>
									<a href="mailto:info@inji.nl">info@inji.nl</a>.<br> 
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
									<strong> EMBAV </strong> <br>
									Susanne Meeuwissen <br>
									0641306310 <br>
									<a href="mailto:susanne@embav.nl">susanne@embav.nl</a>.<br> 
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
									<strong> ECORYS </strong> <br>
									Henk Bakker <br>
									0613000603 <br>
									<a href="mailto:henk.bakker@ecorys.com">henk.bakker@ecorys.com</a>.<br> 
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