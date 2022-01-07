<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
        }

        .page-forgot-pass {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e6e6e6;
        }

        .card-forgot-pass {
            height: 60vh;
            width: 50vh;
            background-color: white;
            border-radius: 0 0 20px 20px;
            padding: 30px;
            position: relative;
        }

        .card-forgot-pass input {
            width: 100%;
            border-radius: 30px;
            border: 1px solid grey;
            padding: 10px 25px;
        }

        .card-forgot-pass button {
            position: absolute;
            bottom: 30px;
            padding: 15px 35px;
            border-radius: 30px;
        }

        .page-forgot-pass .a-link {
            font-size: 20px;
            font-weight: bold;
        }

    </style>
</head>

<body>
    <section class="page-forgot-pass ">

        <div>
            <div class="bg-light p-3" style="text-align: right; border-radius: 20px 20px 0 0;">
                <!-- <h1 class="fw-bold logo-title" href="">BOLABOL.in</h1> -->
                <a style="background-color: transparent; padding: 5px;" href="{{ route('login') }}"
                    class="a-link">x</a>
            </div>
            <div class="card-forgot-pass">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h1 class="mb-5 fw-bold">Forgot Password ?</h1>
                    <p>Masukkan email anda untuk kami kirimkan link reset password</p>
                    <input id="email" type="email" placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <br>
                    <button type="submit" class="redButton">Reset Password</button>
                </form>
            </div>
        </div>

    </section>

</body>

</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
