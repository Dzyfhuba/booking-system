@extends('layouts.app')
@section('content')
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

        .profile-page {
            background-color: white;
            padding: 30px 50px;
            border-radius: 30px;
            display: flex;
            overflow: hidden;
            overflow-y: auto;
            position: relative;

        }

        .profile-page .profile-img {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            overflow: hidden;

        }

        .profile-page .profile-img img {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .profile-page .profile-detail {
            /* padding: 0px 50px; */
        }

        .profile-page .profile-detail td {
            padding: 10px 5px;
        }

        .profile-date-time {
            width: 100%;
            background-image: url("img/rumput.jpg");
            background-size: cover;
            height: 25vh;
            border-radius: 20px;
            color: white;
            padding: 30px;
            overflow: hidden;
            /* justify-content: center; */
        }

        .profile-riwayat {
            /* background-color: #f8f9fa; */
            height: 53vh;
            overflow: hidden;
        }

        .profile-riwayat .tempat-list {
            background-color: white;
            height: 85%;
            overflow-y: auto;
            border-radius: 20px;
        }

        #modalEditProfile {
            position: fixed;
            top: 0px;
            bottom: 0px;
            right: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.2);
            display: none;
            justify-content: center;
            overflow: auto;
            padding: 6%;
            backdrop-filter: blur(10px);
        }

        #modalEditProfile .card {
            height: auto;
            width: 40%;
            background-color: white;
            padding: 50px;
            border-radius: 20px;
            position: relative;
            overflow: auto;
        }

        #modalEditProfile .card textarea {
            border-radius: 5px;
            height: 80px;
            resize: none;

        }

        @media screen and (max-width: 576px) {
            #modalEditProfile {
                padding: 0px;
            }

            #modalEditProfile .card {
                width: 100%;
                height: auto;
                border-radius: 0px;

            }

            #modalEditProfile .card input {
                margin-bottom: 10px;
            }
        }

    </style>



    <div class="profile-page col-xxl-7  bg-light">
        {{-- Logout Button --}}
        <div class="text-end" style="position: absolute; top: 10px; right: 0;">
            <b class="btn-red-bg px-4 py-3" style="border-radius: 0px 0px 0px 20px;" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</b>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        @role('user')
            <div class="row col">
                <div class="col-md-3">
                    <div class="d-flex justify-content-center">
                        <div class="profile-img">
                            <img src="img/profile-1.jpg">
                        </div>
                    </div>
                    <div class="text-center">
                        <h3><b>{{ $user->name }}</b></h3>
                        <br>
                        <a class="a-link" onclick="openEditProfile()">Edit profile</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-detail my-4">
                        <table>
                            <tr>
                                <td><b>Email </b></td>
                                <td> : </td>
                                <td><a>{{ $user->email }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Nomor HP </b></td>
                                <td> : </td>
                                <td><a>{{ $userdetail->nohp }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Lahir </b></td>
                                <td> : </td>
                                <td><a>{{ $userdetail->ttl }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Alamat </b></td>
                                <td> : </td>
                                <td><a>{{ $userdetail->alamat }}</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endrole

        @role('provider')
            <div class="row col">
                <div class="col-md-3">
                    <div class="d-flex justify-content-center">
                        <div class="profile-img">
                            <img src="img/profile-1.jpg">
                        </div>
                    </div>
                    <div class="text-center">
                        <h3><b>{{ $provider->nama_tempat }}</b></h3>
                        <br>
                        <a class="a-link" onclick="openEditProfile()">Edit profile</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-detail my-4">
                        <table>
                            <tr>
                                <td><b>Nama Tempat </b></td>
                                <td> : </td>
                                <td><a>{{ $provider->nama_tempat }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Email </b></td>
                                <td> : </td>
                                <td><a>{{ $provider->email }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Nomor HP </b></td>
                                <td> : </td>
                                <td><a>{{ $provider->nohp }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Alamat </b></td>
                                <td> : </td>
                                <td><a>{{ $provider->alamat }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Bukti Kepemilikan </b></td>
                                <td> : </td>
                                <td><a></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endrole
    </div>

    {{-- Modal Edit --}}
    @role('user')
        <div id="modalEditProfile">
            <div class="card">
                <div style="position: absolute; top: 20px; right: 20px;">
                    <b class="a-link" onclick="closeEditProfile()">X</b>
                </div>
                <div>
                    <h3><b>Edit Profile</b></h3>
                </div>
                <br>
                <form action="{{ route('profile.save') }}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="row mb-sm-3">
                                <b class="col-md-3">Nama</b>
                                <input class="col-md-7" type="text" value="{{ $userdetail->namalengkap }}"
                                    name="namalengkap">
                            </div>
                            <div class="row mb-sm-3">
                                <b class="col-md-3">Email</b>
                                <input class="col-md-7" type="email" value="{{ $userdetail->email }}" name="email">
                            </div>
                            <div class="row mb-sm-3">
                                <b class="col-md-3">Nomor HP</b>
                                <input class="col-md-7" type="text" value="{{ $userdetail->nohp }}" name="nohp">
                            </div>
                            <div class="row mb-sm-3">
                                <b class="col-md-3">Tanggal Lahir</b>
                                <input class="col-md-7" type="date" value="{{ $userdetail->ttl }}" name="ttl">
                            </div>
                            <div class="row mb-sm-3">
                                <b class="col-md-3">Alamat</b>
                                <textarea class="col-md-7" name="alamat">{{ $userdetail->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div style="position: absolute; bottom: 20px; right: 20px;">
                        <button type="submit" class="bg-success float-end text-white fw-bold"
                            style="border-radius: 30px">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    @endrole
    @role('provider')
        <div id="modalEditProfile">
            <div class="card">
                <div style="position: absolute; top: 20px; right: 20px;">
                    <b class="a-link" onclick="closeEditProfile()">X</b>
                </div>
                <div>
                    <h3><b>Edit Profile</b></h3>
                </div>
                <br>
                <form action="{{ route('profile.save.provider') }}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="row mb-sm-3">
                                <b class="col-md-3">Nama</b>
                                <input class="col-md-7" type="text" value="{{ $provider->nama_tempat }}"
                                    name="nama_tempat">
                            </div>
                            <div class="row mb-sm-3">
                                <b class="col-md-3">Email</b>
                                <input class="col-md-7" type="email" value="{{ $provider->email }}" name="email">
                            </div>
                            <div class="row mb-sm-3">
                                <b class="col-md-3">Nomor HP</b>
                                <input class="col-md-7" type="text" value="{{ $provider->nohp }}" name="nohp">
                            </div>
                            <div class="row mb-sm-3">
                                <b class="col-md-3">Alamat</b>
                                <textarea class="col-md-7" name="alamat">{{ $provider->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div style="position: absolute; bottom: 20px; right: 20px;">
                        <button type="submit" class="bg-success float-end text-white fw-bold"
                            style="border-radius: 30px">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    @endrole


    {{-- <h1>Profile</h1>
    <br>
    <form action="{{ route('profile.save') }}" method='post' enctype="multipart/form-data">
        @csrf
        <div class="bg-dark text-white rounded p-3">

            <h5 class="text-warning">Nama Lengkap</h5>
            <p class="fw-bold">{{ $user->name }}</p>
            <input class="col" type="text" name="namalengkap" id="" placeholder="Nama..."
                value="{{ $userdetail->namalengkap }}">

            <h5 class="text-warning">Email</h5>
            <p class="fw-bold">{{ $user->email }}</p>
            <input class="col" type="text" name="email" id="" placeholder="Email..."
                value="{{ $userdetail->email }}">

            <h5 class="text-warning">Alamat</h5>
            <p class="fw-bold">{{ $userdetail->alamat }}</p>
            <input class="col" type="text" name="alamat" id="" placeholder="Alamat..."
                value="{{ $userdetail->alamat }}">
            <h5 class="text-warning">No HP</h5>
            <p class="fw-bold">{{ $userdetail->nohp }}</p>
            <input class="col" type="text" name="nohp" id="" placeholder="No HP..."
                value="{{ $userdetail->nohp }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form> --}}
@endsection
