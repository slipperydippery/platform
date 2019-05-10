@extends('layouts.app', ['title' => 'Log in'])

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-12">
            <div class="card-group">
                <div class="card card__login">
                    <a href=" {{ route('register') }} " class="stretched-link"><div class="card-header text-center"><h4>{{ __('Registreer') }}</h4></div></a>

                    <div class="card-body">
                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="name" class="col-md-12 col-form-label ">{{ __('Naam') }}</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required disabled>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('E-mailadres') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required disabled>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="phone_number" class="col-sm-12 col-form-label">{{ __('Mobiel telefoonnummer') }}</label>
                                    <input id="phone_number" type="phone_number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required disabled placeholder="06">

                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="password" class="col-md-12 col-form-label">{{ __('Wachtwoord') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required disabled>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Herhaal wachtwoord') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required disabled>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }} form-check">
                                <label>
                                    <input type="checkbox" class="form-check-input" id="voorwaarden" required disabled>
                                    <label class="form-check-label" for="voorwaarden"> Ik accepteer de <a href="#" data-toggle="modal" data-target="#voorwaardenmodal"> algemene voorwaarden</a> </label>
                                    
                                </label>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" disabled>
                                        {{ __('Registreer') }}
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card card__login">
                    <div class="card-header text-center"><h4> Log in </h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="email" class="col-sm-12 col-form-label">{{ __('E-mailadres') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="password" class="col-md-12 col-form-label">{{ __('Wachtwoord') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Blijf ingelogd') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Wachtwoord vergeten?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
