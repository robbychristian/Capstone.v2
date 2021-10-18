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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--ANIMATION JS-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--ANIMATION-->

    <!--Font Awesome-->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
        
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <!--IF AUTH-->
            @if (Auth::check())
                @if (Auth::user()->user_role === 4)
                    <!--USER NAVBAR-->

                    <div class="container-fluid">


                        <!-- NAVBAR TOGGLER FOR THE VERTICAL NAVBAR (RESPONSIVE)-->
                        @auth
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        @endauth

                        @guest
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ URL::asset('img/Logo-blue-cropped.png') }}" alt="" srcset=""
                                    class="logo-brand">
                            </a>
                        @endguest

                        @auth
                            <a class="navbar-brand" href="{{ url('user/home') }}">
                                <img src="{{ URL::asset('img/Logo-blue-cropped.png') }}" alt="" srcset=""
                                    class="logo-brand">
                            </a>
                        @endauth

                        @guest
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                        <li class="nav-item navbar-link">
                                            <a class="nav-link"
                                                href="{{ route('user.login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item navbar-link">
                                            <a class="nav-link"
                                                href="{{ route('user.register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <div class="side-bar d-xl-none d-md-none d-xs-block">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/users/account/{{ Auth::user()->id }}/edit">
                                                <i class="fas fa-user-circle mr-2"></i>Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.announcements.index') }}"> <i
                                                    class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link collapsed text-truncate submenu" href="#submenu1"
                                                data-toggle="collapse" data-target="#submenu1"><i
                                                    class="fas fa-bookmark mr-2"></i> <span
                                                    class="d-sm-inline">Protocols</span></a>
                                            <div class="collapse" id="submenu1" aria-expanded="false">
                                                <ul class="flex-column pl-2 nav">
                                                    <li class="nav-item">
                                                        <a class="nav-link ml-3"
                                                            href="{{ route('user.guidelines.index') }}">Guidelines</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link ml-3"
                                                            href="{{ route('user.evacuation.index') }}">Evacuation
                                                            Centers
                                                            & Hospitals</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i
                                                    class="fas fa-map-marked mr-2"></i>Vulnerability
                                                Map</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>Reports</a>
                                        </li>
                                    </div>
                                    <li class="nav-item dropdown d-none d-xl-block d-lg-block d-md-block">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

                @elseif (Auth::user()->user_role === 3)
                    <!--BARANGAY OFFICIAL NAVBAR-->
                    <div class="container-fluid">


                        <!-- NAVBAR TOGGLER FOR THE VERTICAL NAVBAR (RESPONSIVE)-->
                        @auth
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        @endauth

                        @guest
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ URL::asset('img/Logo-blue-cropped.png') }}" alt="" srcset=""
                                    class="logo-brand">
                            </a>
                        @endguest

                        @auth
                            <a class="navbar-brand" href="{{ url('brgy_official/home') }}">
                                <img src="{{ URL::asset('img/Logo-blue-cropped.png') }}" alt="" srcset=""
                                    class="logo-brand">
                            </a>
                        @endauth

                        @guest
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                        <li class="nav-item navbar-link">
                                            <a class="nav-link"
                                                href="{{ route('user.login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item navbar-link">
                                            <a class="nav-link"
                                                href="{{ route('user.register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <div class="side-bar d-xl-none d-md-none d-xs-block">
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="/brgy_official/account/{{ Auth::user()->id }}/edit">
                                                <i class="fas fa-user-circle mr-2"></i>Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('brgy_official.announcements.index') }}"> <i
                                                    class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link collapsed text-truncate submenu" href="#submenu1"
                                                data-toggle="collapse" data-target="#submenu1"><i
                                                    class="fas fa-bookmark mr-2"></i> <span
                                                    class="d-sm-inline">Protocols</span></a>
                                            <div class="collapse" id="submenu1" aria-expanded="false">
                                                <ul class="flex-column pl-2 nav">
                                                    <li class="nav-item">
                                                        <a class="nav-link ml-3"
                                                            href="{{ route('brgy_official.guidelines.index') }}">Guidelines</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link ml-3"
                                                            href="{{ route('brgy_official.evacuation.index') }}">Evacuation
                                                            Centers
                                                            & Hospitals</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i
                                                    class="fas fa-map-marked mr-2"></i>Vulnerability
                                                Map</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>Reports</a>
                                        </li>
                                    </div>
                                    <li class="nav-item dropdown d-none d-xl-block d-lg-block d-md-block">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
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
                @elseif (Auth::user()->user_role === 1)
                    <!--ADMIN NAVBAR-->
                    <div class="container-fluid">


                        <!-- NAVBAR TOGGLER FOR THE VERTICAL NAVBAR (RESPONSIVE)-->
                        @auth
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        @endauth

                        @guest
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ URL::asset('img/Logo-blue-cropped.png') }}" alt="" srcset=""
                                    class="logo-brand">
                            </a>
                        @endguest

                        @auth
                            <a class="navbar-brand" href="{{ url('admin/home') }}">
                                <img src="{{ URL::asset('img/Logo-blue-cropped.png') }}" alt="" srcset=""
                                    class="logo-brand">
                            </a>
                        @endauth

                        @guest
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                        <li class="nav-item navbar-link">
                                            <a class="nav-link"
                                                href="{{ route('user.login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item navbar-link">
                                            <a class="nav-link"
                                                href="{{ route('user.register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <div class="side-bar d-xl-none d-md-none d-xs-block">
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="/brgy_official/announcements/{{ Auth::user()->id }}/edit">
                                                <i class="fas fa-user-circle mr-2"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.announcements.index') }}">
                                                <i class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link collapsed text-truncate submenu" href="#submenu1"
                                                data-toggle="collapse" data-target="#submenu1"><i
                                                    class="fas fa-bookmark mr-2"></i> <span
                                                    class="d-sm-inline">Protocols</span></a>
                                            <div class="collapse" id="submenu1" aria-expanded="false">
                                                <ul class="flex-column pl-2 nav">
                                                    <li class="nav-item">
                                                        <a class="nav-link ml-3"
                                                            href="{{ route('admin.guidelines.index') }}">Guidelines</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link ml-3"
                                                            href="{{ route('admin.evacuation.index') }}">Evacuation
                                                            Centers
                                                            & Hospitals</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i
                                                    class="fas fa-map-marked mr-2"></i>Vulnerability
                                                Map</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>Reports</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>Emergency
                                                Alert Message</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>User
                                                Role</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('admin.manageresident.index') }}"><i
                                                    class="fas fa-edit mr-2"></i>Manage Residents</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>Manage
                                                Barangay Officials</a>
                                        </li>
                                    </div>
                                    <li class="nav-item dropdown d-none d-xl-block d-lg-block d-md-block">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
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
                @endif

                <!--IF GUEST-->
            @elseif(!Auth::check())
                <!--GUEST NAVBAR-->
                <div class="container-fluid">


                    <!-- NAVBAR TOGGLER FOR THE VERTICAL NAVBAR (RESPONSIVE)-->
                    @auth
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    @endauth

                    @guest
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ URL::asset('img/Logo-blue-cropped.png') }}" alt="" srcset=""
                                class="logo-brand">
                        </a>
                    @endguest

                    @auth
                        <a class="navbar-brand" href="{{ url('user/home') }}">
                            <img src="{{ URL::asset('img/Logo-blue-cropped.png') }}" alt="" srcset=""
                                class="logo-brand">
                        </a>
                    @endauth

                    @guest
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                    <li class="nav-item navbar-link">
                                        <a class="nav-link "
                                            href="{{ route('user.login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item navbar-link">
                                        <a class="nav-link"
                                            href="{{ route('user.register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            </ul>
                        @endguest

                    </div>

                </div>
            @endif
        </nav>

        <main>
            @yield('content')
        </main>
    </div>


</body>

</html>
