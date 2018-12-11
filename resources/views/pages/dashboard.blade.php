@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')

@foreach ($user->dashmessages as $dashmessage)
    @include('partials.dashmessage')
@endforeach

<div class="container container--page">
    <div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="pagetitle">Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="row mt-3">
    	{{-- main Scan stuff --}}
    	<div class="col-md-9">
    		<div class="row mb-5">
    			<div class="col border">
    				<div class="row">
    					<div class="col-12 pt-2" >
				    		<h6>Mijn Scans</h6>
    					</div>
    				</div>
		    		<div class="row p-1 bg-white text-secondary border">
		    			<div class="col-12">
		    				<i class="material-icons md-inactive"> star </i> hier is een scan
		    			</div>
		    		</div>
		    		<div class="row p-1 bg-white text-secondary border">
		    			<div class="col-12">
		    				<i class="material-icons md-inactive"> account_circle </i> hier is nog een scan
		    			</div>
		    		</div>
		    		<div class="row p-1 bg-white text-secondary border">
		    			<div class="col-12">
		    				<i class="material-icons md-inactive"> account_circle </i> hier is nog een scan
		    			</div>
		    		</div>
		    		<a href=" {{ route('scan.new') }} " class="">+ Maak een nieuwe scan aan</a>
    			</div>
    		</div>
    		<div class="row mb-5">
    			<div class="col shadow">
    				<div class="row">
    					<div class="col-12 pt-2 border-top border-primary">
				    		<h6>Mijn groepen</h6>
    					</div>
    				</div>
		    		<div class="row p-1 bg-white text-secondary border">
		    			<div class="col-12">
		    				hier is een groep
		    			</div>
		    		</div>
		    		<div class="row p-1 bg-white text-secondary border">
		    			<div class="col-12">
		    				hier is nog een groep
		    			</div>
		    		</div>
		    		<div class="row p-1 bg-white text-secondary border">
		    			<div class="col-12">
		    				hier is nog een groep
		    			</div>
		    		</div>
		    		<a href="#" class=""> + Maak een nieuwe groep aan</a>
    			</div>
    		</div>
    		
    	</div>

    	{{-- Sidebar functions --}}
    	<div class="col-md-3">
    		<a href=" {{ route('introductiefilm') }} " title="">
    		    <div class="card card__dashboard mb-4">
    		        <div class="card-body">
		    		    <h5 class="card-title">Instructiefilm</h5>
    		            <img src="/img/films.jpg" alt="">
    		        </div>
    		    </div>
    		</a>
            <div class="card card__dashboard mb-4" data-toggle="tooltip" data-placement="top" title="De kennisbank is nog in ontwikkeling">
                <div class="card-body">
                    <h5 class="card-title disabled">Kennisbank</h5>
                    <img src="/img/book_disabled.jpg" alt="">
                </div>
            </div>
            <div class="card card__dashboard mb-4" data-toggle="tooltip" data-placement="top" title="De kennisbank is nog in ontwikkeling">
                <div class="card-body">
                    <h5 class="card-title disabled">Scans vergelijken</h5>
                    <img src="/img/book_disabled.jpg" alt="">
                </div>
            </div>
    		
    	</div>
    </div>
        
</div>
@endsection

@section('additional-scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
              $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection