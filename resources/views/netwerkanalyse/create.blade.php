@extends('layouts.app', ['title' => 'nieuwe netwerkanalyse'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page--title">
                    <h1 class="pagetitle">Nieuwe netwerkanalyse</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if($netwerkanalyses->count())
                    <div class="alert alert-primary mt-3" role="alert">
                        Je hebt al eerder een Analyse van je netwerkpartners gemaakt, wil je die weer gebruiken, of wil je een nieuwe aanmaken?
                        <ul class="">
                            @foreach($netwerkanalyses as $netwerkanalyse)
                                <a href=" {{ route('netwerkanalyse.edit', $netwerkanalyse)  }} " class="">
                                    <li>
                                        {{ $netwerkanalyse->title }}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            <div class="col-md-8 offset-md-2 border shadow my-2">

                <create-netwerkanalyse
                    title = " {{ $title  }} "
                    user_id = " {{ Auth::user()->id  }} "
                >
                </create-netwerkanalyse>
            </div>
        </div>
    </div>
@stop

@section('additional-scripts')
@endsection
