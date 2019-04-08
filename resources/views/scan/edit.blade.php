@extends('layouts.app', ['title' => 'Nieuwe Scan'])

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="pagetitle">Bewerk {{ $scan->title }}</h1>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmdelete{{ $scan->id }}">verwijder scan</a>

            </div>
            
            <form action="{{ route('scan.store', $scan) }}" method="post" accept-charset="utf-8">
                {{ csrf_field() }}
            	@include('scan.partials.form', ['submittext' => 'sla scan op'])
            </form>
        </div>
	</div>
</div>

@component('components.deleteconfirm', ['thisscan' => $scan])
                @endcomponent




@stop


@section('additional-scripts')
@endsection