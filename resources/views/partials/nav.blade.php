<nav class="navbar navbar-expand-lg navbar-light px-5">
        <a class="navbar-brand mr-4 d-flex" href="{{ url('/') }}">
            @if(Request::is('/'))
                <img src="/img/1627logo.svg" height="50" width="auto" class="align-top mr-1 d-none d-xl-block" alt="Logo">
                <h4 class="align-self-center ml-3 pt-1"><span class="text-primary">Participatie</span><span class="text-secondary"></span><span class="text-muted">scan</span></h4>
            @else
                <img src="/img/1627logo.svg" height="50" width="auto" class="align-top mr-1 d-none d-xl-block" alt="Logo">
                <h4 class="align-self-center ml-3 pt-1"><span class="text-primary">Participatie</span><span class="text-secondary"></span><span class="text-muted">scan</span></h4>
            @endif
        </a>
        
        <button class="navbar-toggler hidden-lg-up pull-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-toggleable-md navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto col">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link btn btn-primary" href="{{ route('register') }}">{{ __('Registreer') }}</a></li>
                    <li><a class="nav-link mr-4" href="{{ route('login') }}">{{ __('Log in') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profielModal">Beheer profiel</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @can('do-anything')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Admin <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href=" {{ route('articletype.index') }} "> Bewerk Kennisbank </a>
                                <a class="dropdown-item" href=" {{ route('globalresults') }} "> Bekijk alle resultaten </a>

                            </div>
                        </li>
                    @endif
                @endcan

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Meer info <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href=" {{ route('contact') }} "> Contact </a>
                        <a class="dropdown-item" href="https://www.16-27.nl/privacyverklaring" target="_blank"> Privacyverklaring </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Instructie <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#instructieModal"> Hoe werkt het? </a>
                        <a class="dropdown-item" href="http://embav.nl/participatiescaninstructie/" target="blank"> Handleiding voor gebruikers </a>
                        <a class="dropdown-item" href="http://embav.nl/participatiescaninstructievoorzitter/" target="blank"> Handleiding voor voorzitter/beheerder </a>
                    </div>
                </li>
                @auth
                    <li class="nav-item"><a class="nav-link nav-link--main mr-4 align-top" href=" {{ route('dashboard') }} ">Startpagina</a></li>
                @endauth

            </ul>
        </div>
</nav>