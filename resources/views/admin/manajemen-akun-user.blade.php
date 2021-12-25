@extends('admin.manajemen-akun')
@section('contentUser')
    <div class="d-flex menu menu-2">
        <div>
            <a href="{{ route('manajemen-akun.user') }}" class="a-link {{ Route::currentRouteName() == 'manajemen-akun.user' ? 'a-linkactive' : '' }} ">List</a>
        </div>
        <div>
            <a href="{{ route('manajemen-akun.user.banned') }}" class="a-link {{ strpos(url()->current(), '/manajemen-akun/user/banned') ? 'a-linkactive' : '' }}">Banned</a>
        </div>
    </div>
    <div class="py-3">
        @if (Route::currentRouteName() == 'manajemen-akun.user')
            @foreach ($userdetail as $userdetail)
                <div class="bg-white">
                    <div style="float: right;" class="">
                        <button>WARNING</button>
                        <button>BANNED</button>
                        <button>ROLE</button>
                        <button>REMOVE</button>
                    </div>
                    <div class="accordion ">
                        <div class="d-flex justify-content-md-between">
                            <a>{{ $userdetail->namalengkap }}</a>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="row py-3">
                            <div class="col-md-7">
                                <h3>Informasi Pribadi</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img style="background-color: grey; height: 150px; width:150px;">
                                    </div>
                                    <div class="col-md-8 row">
                                        <div class="col-md-4 col-6">Nama lengkap</div>
                                        <div class="col-md-8 col-6">
                                            <p>{{ $userdetail->namalengkap }}</p>
                                        </div>
                                        <div class="col-md-4 col-6">Email</div>
                                        <div class="col-md-8 col-6">
                                            <p>{{ $userdetail->email }}</p>
                                        </div>
                                        <div class="col-md-4 col-6">Nomor hp</div>
                                        <div class="col-md-8 col-6">
                                            <p>{{ $userdetail->nohp }}</p>
                                        </div>
                                        <div class="col-md-4 col-6">Tanggal lahir</div>
                                        <div class="col-md-8 col-6">
                                            <p>{{ $userdetail->ttl }}</p>
                                        </div>
                                        <div class="col-md-4 col-6">Alamat</div>
                                        <div class="col-md-4 col-6">{{ $userdetail->alamat }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        @yield('userCategory')


    </div>


@endsection
