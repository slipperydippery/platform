@extends('layouts.app', ['title' => 'Wie zijn je netwerkpartners?'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="page--title pb-2">
                    <h1 class="pagetitle">Leefgebieden Netwerkpartners Participatiescan</h1>
                </div>

                <p>De deelnemers zijn zoals de samenwerking moet zijn: multidisciplinair en op het niveau van
                    management/beleid.</p>
                <ul>
                    <li>
                        Multidisciplinair omdat ook de jongere altijd met meer dan een discipline te maken heeft
                        (zoals onderwijs, werk en zorg) en het gaat om het afspreken van een gezamenlijke
                        verbeteragenda.
                    </li>
                    <li>
                        Op het niveau van management/beleid, omdat het gaat om het versterken van de
                        randvoorwaarden voor de uitvoering: betere samenwerkingsafspraken, zodat de
                        docenten, klantmanagers, coaches et cetera daarvan profiteren. In het onderwijs
                        Vso/pro/entree kan het bijvoorbeeld gaan om directeur samenwerkingsverband,
                        onderwijs coördinator etc..
                    </li>
                    <li>
                        Een goede, interactieve sessie met vruchtbare dialoog en resultaten, bestaat uit
                        maximaal circa 12 sleutelpersonen van genoemde organisaties.
                    </li>
                </ul>
                <p>Hieronder is een netwerktool die helpt om te kijken aan welke partijen gedacht kan worden om mee
                om tafel te gaan bij de Participatiescan. Bij het selecteren van de partners gaat het er om dat er
                wordt nagedacht organisaties en welke bijbehorende sleutelpersonen niet mogen ontbreken bij een
                sessie, waarbij het gaat om de jongeren in een kwetsbare positie in de betreffende regio.</p>

                <p><em>Disclaimer: Deze lijst is niet uitputtend maar dient als een hulpmiddel om de juiste partijen om tafel te
                        krijgen voor de Participatiescan.</em></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 my-2">

                <netwerkpartner-manager
                    :netwerkanalyse = " {{ json_encode($netwerkanalyse)  }} "
                    :leefgebieds = " {{ json_encode( $leefgebieds ) }} "
                >

                </netwerkpartner-manager>

            </div>
        </div>
    </div>
@stop

@section('additional-scripts')
@endsection
