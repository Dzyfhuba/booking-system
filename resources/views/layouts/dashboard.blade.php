<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>

    <title>Dashboard</title>

    <style>
        .card-lapangan td {
            padding-right: 20px;
        }

        #date {
            margin: 30px 0px;
            border: 1px solid grey;
            font-weight: 500;
            padding: 10px 25px;
            border-radius: 30px;
        }

    </style>
</head>

<body class="container-fluid">
    <section class="row">
        <div class="col-md-2 p-5" id="navbarSamping">
            <div class="mb-sm-5">
                <h1 class="fw-bolder">DICUP.in</h1>
            </div>
            <div>
                <h5 class="navbarSampingButton">Home</h5>
                <h5 class="navbarSampingButton">Tagihan</h5>
                <h5 class="navbarSampingButton">Riwayat</h5>
            </div>

        </div>
        <div class="col-md-10" style="height: 100vh;" id="bodyMain">
            <div class="row align-items-center" style="height: 10%;">
                <div class="col-sm-8 d-flex justify-content-md-between">
                    <h2 class="">Daftar Lapangan</h2>
                    <div class=" input-group p-1 h-50 w-25"
                        style="border-radius: 50px; overflow: hidden; border: 1px solid rgb(211, 211, 211);">
                        <span class="input-group-text"
                            style="border: none; background-color: transparent;">&#x1F50D;</span>
                        <input type="text" class="form-control" placeholder="Cari Lapangan" aria-label="Search"
                            aria-describedby="basic-addon1"
                            style="border: none; background-color: transparent; border-radius: 30px;">
                </div>
            </div>

            <div class="col-sm-4 float-end" style="float: right;">
                @guest
                <div style="display: flex; float: right">
                    @if (Route::has('login'))
                            <a class="button btn-login" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                            <a class="button btn-regis" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </div>
                @else

                    <div class="float-end d-flex align-items-center">
                        <div>
                            <b>{{ Auth::user()->name }}</b><br>
                            <a>Edit Profile</a>
                        </div>
                        <div class="ms-3"
                            style="height: 50px; width: 50px; border-radius: 50%; overflow-y: hidden;">
                            <img src="img/profile-1.jpg" style="height: 100%; width: 100%; object-fit: cover;">
                        </div>
                    </div>
                @endguest
            </div>
        </div>
        <div class="row" style="height: 90%;">
            @yield('content')
        </div>

        </div>
    </section>

    <script src="index.js">

    </script>
</body>

</html>
