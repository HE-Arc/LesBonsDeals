<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/master.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/pressuru" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset("/css/master.css")}}" type="text/css"/>

    @yield('include')

</head>
<body>
<div id="app">
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-primary">
        <a id="home-logo" class="navbar-brand" href="{{route('index')}}">LesBonsDeals</a>
        <a href="{{route('index')}}"><img src="{{URL::asset("/images/logo.png")}}" alt="Logo" width="90"/></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent"
                aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navContent">

            <form class="form-inline ml-md-auto" action="{{route('article_find', $_GET)}}">
                <input type="text" placeholder="Recherche" class="form-control mb-2 mb-sm-0" name="name"
                       @if(isset($_GET['name']))
                       value="{{$_GET['name']}}"
                       @else
                       value=""
                        @endif
                >
                <input type="submit" class="btn btn-outline-light ml-2"
                       value="Recherche">
            </form>

            <ul class="navbar navbar-nav ml-md-auto">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown"
                           role="button" aria-expanded="false">
                            {{Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                Mon compte
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Inscription</a></li>
                @endif
            </ul>
        </div>
    </nav>
    @if ($errors->any())
        <div class="alert alert-danger" style="position: absolute; right: 20px; top: 100px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert2@7.0.9/dist/sweetalert2.all.js"></script>
<footer>
    <div class="container-fluid footer text-center">
        @yield('include_footer')
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
</footer>
</body>
</html>
