@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @role('provider')
                            {{ __('You are logged in as provider!') }}
                            <br>
                            @include('provider.dashboard')
                        @endrole
                        @role('user')
                            {{ __('You are logged in as ' . Auth::user()->name . '!') }}
                            <br><a href="{{ route('profile') }}">Profile</a>
                        @endrole

                        @guest()
                            {{ __('You are not logged in!') }}
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @role('provider')
        {{ __('You are logged in as provider!') }}
        <br>
        @include('provider.dashboard')
    @endrole
    @role('user')
        @include('user.home')
    @endrole

    @guest()
        {{ __('You are not logged in!') }}
    @endguest

    @role('admin')
        @include('admin.home')
    @endrole
@endsection
