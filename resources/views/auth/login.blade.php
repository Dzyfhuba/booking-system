<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>
        {{ strpos(url()->current(), '/login') ? 'Login | ' . config('app.name', 'Laravel') : config('app.name', 'Laravel') }}
    </title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <style>
        @media screen and (max-width: 600px) {
            #login-right-side {
                display: none;
            }
        }
        .logoName{
            text-decoration: none;
            color:black;
        }
        .logoName:hover{
            color: black;
        }
    </style>
</head>

<body class="container-fluid">
    <section class=" row">
        <div class="col-md-6 d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div style="text-align: center;">
                <h1 style="text-align: center; font-weight: bolder">Login to BOLABOL</h1><br><br>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3 py-1 px-3"
                        style="border-radius: 50px; overflow: hidden; border: 1px solid grey;">
                        <span class="input-group-text py-3"
                            style="border: none; background-color: transparent;">&#x1F464;</span>
                        <input placeholder="Email"
                            style="border: none; background-color: transparent; border-radius: 30px;" id="email"
                            type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-2 py-1 px-3"
                        style="border-radius: 50px; overflow: hidden; border: 1px solid grey;">
                        <span class="input-group-text py-3"
                            style="border: none; background-color: transparent;">&#x1F512;</span>

                        <input type="password" name="password" class="form-control" placeholder="Password"
                            aria-label="Password" aria-describedby="basic-addon2"
                            style="width: 35vh; border: none; background-color: transparent; border-radius: 30px;">
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (Route::has('password.request'))
                        <a style="float: left; cursor: pointer;" class="mb-5 ms-4"
                            href="{{ route('password.request') }}">Forgot password?</a>
                    @endif

                    <button type="submit" class="btn btn-danger w-100 py-3 fw-bold mb-5" style="border-radius: 30px;">
                        Login
                    </button>

                </form>

                <p>Don't have account ? <a href="{{ route('register') }}">Register now</a></p>
            </div>
        </div>
        <div class="col-md-6 bg-warning" id="login-right-side">
            <section class="justify-content-center align-items-center" style="height: 100vh; display: flex;">
                <div style="text-align: center;">
                    <a href="{{ route('home') }}" class="logoName" style="cursor: pointer">
                        <h1 class="fw-bolder">BOLABOL</h1>
                    </a>
                    <p>Booking futsal field online</p>
                </div>
        </div>
        </div>
    </section>
</body>

</html>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
