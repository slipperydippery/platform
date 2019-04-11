<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name') }}
        @if (isset($title))
            - {{ $title }}
        @endif
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-93563705-6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-93563705-6');
    </script>
</head>

<body class="d-flex flex-column">
    @include('partials.nav')

    @if ($status = Session::get('status'))
        <div class="alert alert-primary mb-0" role="alert">
            {{ $status }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif

    <main class="flex-grow" id="app">
        @yield('content')

        <portal-target name="modals" multiple></portal-target>
    </main>
    
    @hasSection('prevnext')
        <div class="container">
            @yield('prevnext')
            @include('partials.progressbar')
        </div>
    @endif

    @include('partials.instructie')
    @include('partials.profiel')


    @include('partials.footer')


    <!-- Additional Scripts -->
    @yield('additional-scripts')
{{--     <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script> --}}

</body>
</html>
