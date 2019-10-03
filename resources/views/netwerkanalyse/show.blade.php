@extends('layouts.app', ['title' => 'Wie zijn je netwerkpartners?'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page--title">
                    <h1 class="pagetitle">Dit zijn je huidig netwerkpartners</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 my-2">
                <netwerkpartner-overview
                    :netwerkanalyse = " {{ json_encode($netwerkanalyse)  }} "
                    :leefgebieds = " {{ json_encode( $leefgebieds ) }} "
                >

                </netwerkpartner-overview>

            </div>
        </div>
    </div>
@stop

@section('additional-scripts')
@endsection
