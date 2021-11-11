<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>{{ strpos(url()->current(), '/register') ? 'Register | '.config('app.name', 'Laravel') : config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link href="style.css">
    <style>
        @media screen and (max-width: 700px) {
            #regis-left-side {
                display: none;
            }

            #regis-right-side {
                height: 100%;
                padding: 30px;
            }
        }

        input {
            border-radius: 30px;
            border: 1px solid grey;
            padding: 10px 25px;
        }

        input:focus {
            border: 1px solid grey;

        }

        .regist-col-input {
            margin: 20px 0px;
        }

        #regis-right-side {
            height: 100%;
            padding-top: 50px;
        }

        #regis-right-side td {
            padding-bottom: 20px;
        }

        #regis-right-side td a {
            font-weight: 600;
        }

        #regis-right-side input {
            width: 30vh;
        }

        button {
            border: none;
        }

        .btn-gender {
            padding: 10px 25px;
            border-radius: 30px;
            margin-right: 10px;
            cursor: pointer;
        }

        .btn-gender img {
            height: 20px;
            width: auto;
            margin-right: 5px;
            /* background-color: darkcyan; */
        }


        #regis-user-gender button:hover {
            background-color: #e6e6e6;
        }

        .genderActive {
            background-color: #e6e6e6;
        }

    </style>
</head>

<body class="container-fluid">
    <section class=" row">

        <div class="col-md-6 bg-warning" id="regis-left-side">
            <section class="justify-content-center align-items-center" style="height: 100vh; display: flex;">
                <div style="text-align: center;">
                    <h1 class="fw-bolder">DICUP</h1>
                    <p>Booking futsal field online</p>
                </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center" id="regis-right-side">
            <div style="text-align: center;">
                <h1 style="text-align: center; font-weight: bolder;">Register to DICUP</h1><br><br>
                <form action='{{ route('register') }}' method="POST">
                    @csrf
                    <input type="hidden" name="url" value="{{ url()->current() }}">
                    <div style="text-align: left;" class="mb-3">
                        <table>
                            <tr>
                                <td><a>Nama</a></td>
                                <td><input name="name"></td>
                            </tr>
                            <tr>
                                <td><a>Email </a></td>
                                <td><input id="email" type="email"
                                        class="@error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"></td>
                            </tr>
                            @error('email')
                                <tr>
                                    <td></td>
                                    <td>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </td>
                                </tr>
                            @enderror
                            <tr>
                                <td><a>Password </a></td>
                                <td><input type="password" class="@error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password"></td>
                            </tr>
                            @error('password')
                                <tr>
                                    <td></td>
                                    <td>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </td>
                                </tr>
                            @enderror

                            <tr>
                                <td><a>Confirm<br>Password </a></td>
                                <td><input id="password-confirm" type="password"
                                        name="password_confirmation" required autocomplete="new-password"></td>
                            </tr>
                            <tr>
                                <td><a>Nomor HP </a></td>
                                <td><input type="text" name="nomor"></td>
                            </tr>
                            <tr>
                                <td><a>Alamat </a></td>
                                <td><input type="text" name="alamat"></td>
                            </tr>
                            <tr>
                                <td><a>Tanggal Lahir </a>&emsp;</td>
                                <td><input type="date" name="tanggal"></td>
                            </tr>
                            <tr id="regis-user-gender">
                                <td><a>Jenis Kelamin </a></td>
                                <td class="d-flex">
                                    <div class="btn-gender" value="Laki-laki"><img
                                            src="{{ asset('img/male.png') }}">Laki-laki</div>
                                    <div class="btn-gender" value="Perempuan"><img
                                            src="{{ asset('img/female.png') }}">Perempuan</div>
                                    <input style="display: none;" type="text" id="genderPilihan" name="gender">
                                </td>
                            </tr>

                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger w-100 py-3 fw-bold mb-5" style="border-radius: 30px;">
                        Register
                    </button>
                </form>

                <p>Already have an account ? <a href="{{ route('login') }}">Login here</a></p>
                <div class="d-flex justify-content-center mb-3">
                    <hr width="30%"><a style="padding: 0px 20px; color: grey;">or</a>
                    <hr width="30%">
                </div>
                <p>Futsal field owner <a href="{{ route('provider_register_page') }}">Register here</a></p>
            </div>
        </div>
        </div>
    </section>

    <script>
        $(".btn-gender").click(function() {
            var gender = $(this).attr("value");
            $("#genderPilihan").val(gender);
            // alert($("#genderPilihan").val());
            $(".btn-gender").removeClass("genderActive");
            $(this).addClass("genderActive")
        })
    </script>
</body>

</html>

{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
