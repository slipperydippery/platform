@extends('layouts.app', ['title' => 'Wie zijn je netwerkpartners?'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page--title">
                    <h1 class="pagetitle">Wie zijn je netwerkpartners?</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 border shadow my-2">

                <netwerkpartner-manager
                    :netwerkanalyse = " {{ json_encode($netwerkanalyse)  }} "
                    :instanties = " {{ json_encode( $instanties ) }} "
                >

                </netwerkpartner-manager>

            </div>
        </div>
    </div>
@stop

@section('additional-scripts')
@endsection
