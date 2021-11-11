<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .card-lapangan td {
            padding-right: 20px;
        }

        .menu-profile {
            border-radius: 30px;
            padding: 5px;
            padding-right: 20px;
            cursor: pointer;
        }

        .menu-profile:hover {
            background-color: #dc3545;
            color: white;
        }

    </style>
</head>

<body class="container-fluid" id="body">
    <section class="row">

        <!-- NAVBAR SAMPING/HALAMAN KIRI -->
        <div class="col-md-2 container" id="navbarSamping">
            <div class="logo-web py-md-5 p-3">
                <h1 class="fw-bolder"><a href="{{ url('/') }}">{{ config('app.name', 'Bolabol') }}</a></h1>
            </div>
            <div class="menu-samping">
                <h5 class="navbarSampingButton{{ strpos(url()->current(), '/') ? ' button-active-red' : '' }}"
                    id="home-button">Home</h5>
                <h5 class="navbarSampingButton">Tagihan</h5>
                <h5 class="navbarSampingButton">Riwayat</h5>
            </div>
            <div class="menu-burger m-3">
                <h4 onclick="openFullNavbar()" class="a-link">&#9776;</h4>
            </div>

        </div>
        <!-- HALAMAN KANAN  -->
        <div class="col-md-10" style="height: 100vh;" id="bodyMain">
            <!-- NAVBAR ATAS  -->
            <div class="row align-items-center p-3 navbar-atas">
                <div class="col-sm-8">
                    <div class="row">
                        <h2 class="fw-bold col-sm-7"></h2>
                        <div class="col-sm-5 p-0">
                            <div class="input-group p-1" id="searchLapangan">
                                <span class="input-group-text "
                                    style="border: none; background-color: transparent;">&#x1F50D;</span>
                                <input type="text" class="form-control" placeholder="Cari Lapangan"
                                    name="search-lapangan">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-4 float-end col-menu-profil">
                    <div class=" float-end ">
                        <!-- Authentication Links -->
                        @guest
                            <div class="d-flex">
                                @if (Route::has('login'))
                                    <div>
                                        <a class="button a-link nav-link"
                                            href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </div>
                                @endif

                                @if (Route::has('register'))
                                    <div>
                                        <a class="button a-link nav-link"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                @endif
                            </div>

                        @else
                            <div class="navbarSampingButton menu-profile d-flex align-items-center">
                                <div class="me-3"
                                    style="height: 40px; width: 40px; border-radius: 50%; overflow-y: hidden;">
                                    <img src="img/profile-1.jpg" style="height: 100%; width: 100%; object-fit: cover;">
                                </div>
                                <div>
                                    <a>{{ Auth::user()->name }}</a><br>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>

            <!-- ISI LAMAN BODY  -->
            <div class="container-fluid overflow-auto" id="bodyLaman">
                <div class="row py-xxl-5 py-sm-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <div class="" id="navbarFullpage">
        <button onclick="closeFullNavbar()" class="redButton">X</button>
        <div class="menu-samping">
            <h5 class="navbarSampingButton{{ strpos(url()->current(), '/') ? ' button-active-red' : '' }}">Home</h5>
            <h5 class="navbarSampingButton">Tagihan</h5>
            <h5 class="navbarSampingButton">Riwayat</h5>
            <h5 class="navbarSampingButton">Profile</h5>
        </div>
    </div>

    <script src="{{ asset('js/index.js') }}"></script>
    <script>

    </script>
</body>


{{-- <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @guest
        @else
            @if (!Auth::user()->HasVerifiedEmail())
                <div align='center'>Verifikasi dulu, <a href="{{ Route('verification.notice') }}">klik disini!</a></div>
                <br>
            @endif
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body> --}}

</html>
