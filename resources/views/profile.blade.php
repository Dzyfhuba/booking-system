@extends('layouts.app')
@section('content')
    <h1>Profile</h1>
    <br>
<form action="{{ route ('profile.save') }}" method='post' enctype="multipart/form-data">
    @csrf
    <div class="bg-dark text-white rounded p-3">
        <p class="fw-bold">{{ $userdetail->nik }}</p>
        <h5 class="text-warning">Nama Lengkap</h5>
        <p class="fw-bold">{{ $user->name }}</p>
        <input class="col" type="text" name="namalengkap" id="" placeholder="Nama..." value="{{ $userdetail->namalengkap }}">
        
        <h5 class="text-warning">Email</h5>
        <p class="fw-bold">{{ $user->email }}</p>
        <input class="col" type="text" name="email" id="" placeholder="Email..." value="{{ $userdetail->email }}">
        
        <h5 class="text-warning">Alamat</h5>
        <p class="fw-bold">{{ $userdetail->alamat }}</p>
        <input class="col" type="text" name="alamat" id="" placeholder="Alamat..." value="{{ $userdetail->alamat }}">
        <h5 class="text-warning">No HP</h5>
        <p class="fw-bold">{{ $userdetail->nohp }}</p>
        <input class="col" type="text" name="nohp" id="" placeholder="No HP..." value="{{ $userdetail->nohp }}">
        <div class="row">
            <h5 class="text-warning col-md-2">NIK</h5>
            <input class="col" type="file" name="fotoktp" id="" placeholder="NIK..." value="{{ $userdetail->nik }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
