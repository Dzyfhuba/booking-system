@extends('layouts.app')
@section('content')
    <h1>
        <center>List Lapangan</center>
    </h1>
    <a href="{{ route('provider.add') }}">Add</a>
    <table border="1" align="center">

        <tr>
            <th>ID</th>
            <th>Nama Lapangan</th>
            <th>Jenis Lapangan</th>
            <th>Luas Lapangan M²</th>
            <th>Tarif Perjam</th>
            <th>Opsi</th>
        </tr>
        {{-- @if (is_array($lapangan) || is_object($lapangan)) --}}
        @foreach ($lapangan as $lp => $l)
            <tr>
                <td>{{ $l->id }}</td>
                <td>{{ $l->nama_lapangan }}</td>
                <td>{{ $l->jenis_lapangan }}</td>
                <td>{{ $l->luas_lapangan }}</td>
                <td>{{ $l->tarif_perjam }}</td>
                <td>
                    <form action="{{ route('provider.delete', $l->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input class="btn" type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        @endforeach
        {{-- @else
        @endif --}}
    </table>
@endsection
