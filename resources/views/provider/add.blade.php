@extends('layouts.app')
@section('content')
    <h1>
        <center>Add Lapangan</center>
    </h1>
    <form action="{{ route('provider.save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <table align="center">
            <tr>
                <td>Nama Lapangan : </td>
                <td colspan="2"><input type="text" name="namalapangan" id=""></td>
            </tr>
            <tr>
                <td>Jenis Lapangan : </td>
                <td colspan="2">
                    <select name="jenislapangan" id="">
                        <option>Pilih</option>
                        @foreach ($data as $row => $r)
                            <option value="{{ $r->id }}">{{ $r->jenis_lapangan }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Luas Lapangan : </td>
                <td><input type="number" name="luaslapangan" id=""></td>
                <td>M²</td>
            </tr>
            <tr>
                <td>Tarif Lapangan : RP. </td>
                <td colspan="2"><input type="text" name="tariflapangan" id=""></td>
            </tr>
            <tr>
                <td>Foto Lapangan : </td>
                <td colspan="2"><input type="file" name="fotolapangan" id=""></td>
            </tr>
            <tr>
                <td colspan="3">
                    <center><button>Daftar</button></center>
                </td>
            </tr>
        </table>
    </form>
@endsection
