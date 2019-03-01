@extends('layouts.app', ['title' => 'Log in'])

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <ul class="nav nav-tabs nav-tabs__login justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href=" {{ route('register') }} "> Registreer </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href=" # "> Log in </a>
                </li>
            </ul>
            <div class="card card__login">
                <div class="card-header text-center"><h4>{{ __('Login') }}</h4></div>

                <div class="card-body">
                    <form role="form" method="POST" action="/2fa">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input id="2fa" type="text" class="form-control" name="2fa" placeholder="Enter the code you received here." required autofocus>
                            @if ($errors->has('2fa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('2fa') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
