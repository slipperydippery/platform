<!-- Modal -->
@auth
    <div class="modal fade" id="profielModal" tabindex="-1" role="dialog" aria-labelledby="profielModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="instructieModalLabel">Beheer profiel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.update', Auth::user()) }}">
                        @method('patch')
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Naam') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col my-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sharepermission" {{ Auth::user()->sharepermission ? 'checked' : '' }}> {{ __('Mijn scans zijn anoniem te vergelijken door andere gebruikers') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end my-3">
                            <button type="submit" class="btn btn-primary float-right">
                                {{ __('Sla op') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-q">  
                    <div class="col d-flex justify-content-end my-0">
                        <a class="btn btn-link clearfix float-right" href="{{ route('changepassword.show') }}">
                            {{ __('Wijzig wachtwoord') }}
                        </a>
                        <a class="btn btn-link text-danger float-right" href="#" data-toggle="modal" data-target="#confirmdeleteaccount">Verwijder mijn account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif