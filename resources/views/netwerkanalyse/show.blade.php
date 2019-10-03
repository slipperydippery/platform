@extends('layouts.app', ['title' => 'Wie zijn je netwerkpartners?'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page--title pb-2">
                    <h1 class="pagetitle"> Deze mensen ontbreken uit je netwerk </h1>
                </div>
                <p>
                    Hieronder zie je een overzicht van netwerkpartners die je zojuist hebt ingevoerd. De netwerkpartners
                    die op het moment ontbreken uit je netwerk zijn geaccentueerd. Voor een optimaal resultaat is het raadzaam
                    om tenminste twee sleutelpersonen van elk leefgebied uit te nodigen.

                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 my-2">
                <netwerkpartner-overview
                    :netwerkanalyse = " {{ json_encode($netwerkanalyse)  }} "
                    :leefgebieds = " {{ json_encode( $leefgebieds ) }} "
                >

                </netwerkpartner-overview>
                <a href=" {{ route('dashboard') }} " class="btn btn-primary btn-lg"> Terug naar het dashboard </a>

            </div>
        </div>
    </div>
@stop

@section('additional-scripts')
@endsection
