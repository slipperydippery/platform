<nav class="navbar navbar-expand-lg navbar-light px-5">
        <a class="navbar-brand mr-4 d-flex" href="{{ url('/') }}">
            @if(Request::is('/'))
                <img src="/img/1627logo-minimal.svg" height="50" width="auto" class="align-top mr-1 d-none d-xl-block" alt="Logo">
                <h4 class="align-self-center ml-3"><span class="text-primary">Participatie</span><span class="text-secondary">.</span><span class="text-muted">scan</span></h4>
            @else
                <img src="/img/1627logo-minimal.svg" height="40" width="auto" class="align-top mr-1 d-none d-xl-block" alt="Logo">
                <h4 class="align-self-center ml-3"><span class="text-primary">Participatie</span><span class="text-secondary">.</span><span class="text-muted">scan</span></h4>
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
                @endguest

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Meer info <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href=" # "> Contact </a>
                        <a class="dropdown-item" href="/pdf/Handleiding digitale gesprekshulp.pdf" target="blank"> Handleiding </a>
                        <a class="dropdown-item" href="/pdf/Literatuurlijst digitale gesprekshulp.pdf" target="blank"> Literatuurlijst </a>
                        <a class="dropdown-item" href="#"> Privacyverklaring </a>
                        <a class="dropdown-item" href=" # "> Cookieverklaring </a>
                    </div>
                </li>
                @guest
                @else
                    <li class="nav-item"><a class="nav-link nav-link--main mr-4 align-top" href=" {{ route('dashboard') }} ">Dashboard</a></li>
                @endguest
                <li class="nav-item"><a class="nav-link nav-link--main mr-4" href="#" data-toggle="modal" data-target="#instructieModal">Instructie</a></li>

            </ul>
        </div>
</nav>