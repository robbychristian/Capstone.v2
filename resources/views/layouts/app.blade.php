<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KaBisig @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">


                <!-- NAVBAR TOGGLER FOR THE VERTICAL NAVBAR (RESPONSIVE)-->
                @auth
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endauth

                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'KaBisig') }}
                    </a>
                @endguest

                @auth
                    <a class="navbar-brand" href="{{ url('user/home') }}">
                        {{ config('app.name', 'KaBisig') }}
                    </a>
                @endauth

                @guest
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endguest

                <!-- MOBILE LOGOUT BUTTON -->
                @auth
                    <div class="navbar-toggler" style="border: none">
                        <div class="btn-group">
                            <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span><i class="fas fa-user-circle fa-2x"></i></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <h6 class="dropdown-header">{{ Auth::user()->full_name }}</h6>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); 
                                                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="side-bar d-xl-none d-md-none d-xs-block">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.account.index') }}"> <i
                                            class="fas fa-user-circle mr-2"></i>Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> <i
                                            class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                                </li>
                                <li class="nav-item">
                                    <p class="nav-link" style="margin: 0"> <i
                                            class="fas fa-bookmark mr-2"></i>Protocols</p>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-3" href="{{ route('user.guidelines.index') }}">Guidelines</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-3" href="{{ route('user.evacuation.index') }}">Evacuation Centers
                                        & Hospitals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-map-marked mr-2"></i>Vulnerability
                                        Map</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>Reports</a>
                                </li>
                            </div>
                            <li class="nav-item dropdown d-none d-xl-block d-lg-block d-md-block">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>
                    @endguest

                </div>

            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>


</body>

</html>
