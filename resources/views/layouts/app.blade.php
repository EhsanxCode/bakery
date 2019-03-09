<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bakery') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-validation.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard.css') }}" rel="stylesheet">

    <!-- Removing whitespace -->
    <style> 
    body{
        padding-bottom: 0px;
    }

    footer{
        postion: absolute;
        background: scroll center url('/images/footer1.jpg');
    }

    </style>

</head>
<body>
    {{-- <nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-dark"> --}}
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Bakery') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/location">Hours and Location</a>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="/menus">Menus</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/shop">Shop</a>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            {{-- <li class="nav-item"> --}}
                            {{--     <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                            {{-- </li> --}}
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/admin/order">Dashboard</a>

                                @if (Auth::user()->name == "admin")
                                        <a class="dropdown-item" href="/register">Register Staff</a>
                                @endif
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
                </ul>
            </div>
        </div>
    </nav>
    @include('inc.messages')
    @yield('content')
</body>
</html>
