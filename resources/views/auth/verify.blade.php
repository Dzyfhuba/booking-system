<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="style.css">
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
            height: 50vh;
            width: 50vh;
            background-color: white;
            border-radius: 0 0 20px 20px;
            padding: 30px;
            position: relative;
        }

        .card-forgot-pass input {
            width: 100%;
            margin: 3px 0px;
            margin-bottom: 10px;

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
                <!-- <a style="background-color: transparent; padding: 5px;" href="login.html" class="a-link">x</a> -->
                <a style="background-color: transparent; padding: 5px;"></a>
            </div>
            <div class="card-forgot-pass">
                <form>
                    <h1 class="mb-5 fw-bold">Verify Email</h1>
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Link Verifikasi telah dikirim ke email anda
                    </div>
                    @endif
                    
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <a>Lakukan verifikasi email. Jika belum menerima link verifikasi</a>
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Klik disini untuk mengirim ulang</button>
                    </form>
                    <br>
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
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
