@extends('layouts.app', ['title' => 'Nieuwe Scan'])

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="pagetitle">Bewerk {{ $scan->title }}</h1>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmdelete{{ $scan->id }}">verwijder scan</a>

            </div>
            
			<edit-scan
				:scan_id = " {{ $scan->id }} "
				:instanties = " {{ $instanties }} "
				:districts = " {{ $districts }} "
			>
			</edit-scan>
			<edit-districts
			    :scan_id = " {{ $scan->id }} "
			>
			</edit-districts>
            
        </div>
	</div>
</div>

@component('components.deleteconfirm', ['thisscan' => $scan])
@endcomponent




@stop


@section('additional-scripts')
@endsection