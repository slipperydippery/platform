@extends('layouts.scanfluid', ['title' => 'Vergrendeld'])

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-sm-center">   
            <div class="col-md-8 "> 
                <div class="card">
                    <div class="card-header">
                        Vergrendeld!
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p>Op dit moment is de groepssessie nog niet van start. Het is de bedoeling dat iedereen de sessie tegelijk maakt. De groepsleider kan de sessie ontgrendelen. 
                            </p>

                            @if ($scan->group->user->id == Auth::user()->id)
                                <p class="text-center">
                                    <a href=" {{ route('managegroupscan.unlock', $scan->group) }} ">
                                        <i class="material-icons md-48"> lock </i> <br>
                                        <span class="btn btn-primary">Ontgrendel de groep</span>
                                    </a>
                                </p>
                            @else
                                <p class="text-center">
                                    <i class="material-icons md-48"> lock </i> <br>
                                </p>
                            
                            @endif

                            <p>Ben je al erg benieuwd hoe de sessie er uit komt te zien? Dan kun je al wel een individuele scan aanmaken en die doorlopen. De resultaten hiervan kan je ook meteen vergelijken met andere scans om te zien waar jij staat.</p>

                            <a href=" {{ route('createsinglescan.title') }} " class="btn btn-secondary">Maak een individuele scan aan</a>
                            <a href=" {{ route('dashboard') }} " class="btn  btn-outline-primary btn-outline-primary--nooutline">Ga terug naar de startpagina</a>
                            <br >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



@section('additional-scripts')
@endsection