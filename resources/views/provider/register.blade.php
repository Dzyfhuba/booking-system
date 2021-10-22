<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Register</title>

    <link href="style.css">
    <style>
        @media screen and (max-width: 700px) {
            #regis-left-side {
                display: none;
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

        #regis-right-side {
            height: 100%;
            padding-top: 30px;
        }

        button {
            border: none;
        }




        .form-regis-provider input {
            margin-top: 5px;
        }

        #regis-right-side input {
            width: 40vh;
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
                    <!-- <h1>Register to DICUP</h1>
                    <a>Daftar sebagai pemilik lapangan</a> -->
                </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center" id="regis-right-side">
            <div>
                <h1 class="fw-bolder">Register to DICUP</h1>
                <a>Daftar sebagai pemilik lapangan</a>
                <hr>
                <br><br>
                <form action='{{ route('provider_register') }}' method="POST">
                    @csrf
                    <input type="hidden" name="url" value="{{ url()->current() }}">
                    <div style="text-align: left;" class="mb-5 form-regis-provider">
                        <div class="mb-3">
                            <a>Nama Tempat</a><br>
                            <input type="text" name="nama-tempat">
                        </div>
                        <div class="mb-3">
                            <a>Alamat Lengkap</a><br>
                            <input type="text" name="alamat-tempat">
                        </div>

                        <div class="mb-3">
                            <a>Bukti Kepemilikan Tempat (PBB)</a><br>
                            <input type="file" style="border:none; padding-left: 0px; border-radius: 0px;"
                                name="bukti-tempat">
                        </div>

                        <div class="mb-3">
                            <a>Email</a><br>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <a>Password</a><br>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <a>Confirm Password</a><br>
                            <input id="password-confirm" type="password" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>
                        <div class="mb-3">
                            <a>Nomor HP</a><br>
                            <input type="text" name="nomor-hp">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger w-100 py-3 fw-bold mb-5" style="border-radius: 30px;">
                        Register
                    </button>
                </form>

                <p>Already have an account ? <a href="{{ route('login') }}">Login here</a></p>
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
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('provider_register') }}">
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
</div> --}}
