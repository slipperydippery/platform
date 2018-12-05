@extends('layouts.app', ['title' => 'Home'])

@section('content')
    <div class="banner">
        <div class="container container--banner">
        </div>
    </div>

    <div class="welcome">
        <div class="">
            <img src="/img/hero_main_feet.jpg" alt="" class="img-fluid">
        </div>
        <div class="container">
            <div class="row intro-block">
                <div class="col-12">
                    <h2 class="mt-5 font-weight-light">Een analyse- en actietool om te komen tot heldere regionale afspraken en een effectieve samenwerking voor het naar werk begeleiden van jongeren in een kwetsbare positie. Alles wat netwerkpartners nodig hebben om succesvol de handen ineen te slaan.</h2>
                    <div class="text-center pt-3 pb-3">
                        <a href="#" class="btn btn-secondary mx-auto">BEKIJK DE SCAN</a> <br>
                        <a href="/pdf/handleiding_participatiescan.pdf" data-toggle="modal" data-target="#exampleModal"><span class="fineprint fineprint--welcome">Lees hier hoe de scan werkt</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container pb-5">
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="https://dummyimage.com/348x200/ddd/999" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Instructiefilms</h5>
                    <p class="card-text">Bekijk de instructiefilm om te zien hoe de digitale gesprekshulp werkt.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://dummyimage.com/348x200/ddd/999" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Kennisbank</h5>
                    <p class="card-text">
                        Schulden voorkomen? <br>
                        Hoe kunnen we dat samen doen?
                    </p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://dummyimage.com/348x200/ddd/999" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Cijfers uit jouw regio</h5>
                    <p class="card-text">De kennisbank is nog in ontwikkeling.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="hoeWerktHetModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hoeWerktHetModal">Hoe werkt het?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deze gesprekshulp ondersteunt gemeenten bij het opzetten van een samenwerking tussen publieke en private partijen. Uit literatuur blijkt dat de volgende thema’s belangrijk zijn bij het voorkomen van schulden onder burgers:</p>
                    <ul>
                        <li>Drempels voor vragen van hulp</li>
                        <li>Communicatiestrategieën</li>
                        <li>Effectieve samenwerking</li>
                        <li>Professionaliteit van de uitvoering</li>
                    </ul>
                    <p>Op basis van deze thema’s zijn 17 stellingen ontwikkeld om samen het gesprek over te voeren.</p>
                    <p><strong>Stap 1:</strong></p>
                    <p>Bepaal met wie je het beste kunt samenwerken.</p>
                    <p>De “selectiehulp gesprekspartners” geeft je inzicht in de partijen met welke partijen uit jouw regio je dit gesprek kunt voeren.</p>
                    <p><strong>Stap 2:</strong></p>
                    <p>Nodig jouw gesprekspartners uit en ontdek samen aan de hand van deze gesprekshulp hoe je schulden in jouw regio vroegtijdig kunt voorkomen.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- @section('additional-scripts')
@endsection --}}