@extends('layouts.dashboard')

@section('content')
<div class="col-sm-8 h-100 py-3">
    <div class="h-100" style="overflow-y: auto;">
        @for ($i = 1; $i <=10; $i++)
            
        <div class="container-fluid d-flex p-3 mb-3 card-lapangan" style="border-radius: 20px;"
            id="Lapangan1">
            <div class="col-sm-7 d-flex mb-4 mb-md-0">
                <div class="me-3"
                    style="width: 128px; height: 72px; overflow: hidden; border-radius: 10px">
                    <img src="{{ asset('img/Lap1.jpg') }}" style=" width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div>
                    <h4>HSF Gresik Kota Industri</h4>
                    <a>Jl.Nin Aja Dulu</a><br>
                    <!-- <table>
                        <tr>
                            <td><a>Jumlah <br>Lapangan</a></td>
                            <td><a>Start<br>from</a></td>
                        </tr>
                        <tr>
                            <td><b>4</b></td>
                            <td> <b>100k/jam</b></td>
                        </tr>
                    </table> -->
                    <!-- <div class="d-flex justify-content-between">
                        <div>
                            <a>Jumlah <br>Lapangan</a><br>
                            <b>4</b>
                        </div>
                        <div>
                            <a>Start from</a><br>
                            <b>100k/jam</b>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-sm-5 d-flex align-items-center justify-content-end">
                <button class="btn btn-danger px-4 py-2 fw-bold" style=" border-radius: 30px;">
                    Booking
                </button>
            </div>
        </div>
        @endfor

    </div>

</div>
<div class="col-sm-4 py-3 pe-3" id="tabBooking">
    <div class="bg-light p-4" style="border-radius: 30px; height: 85vh; overflow: auto;">
        <div class="w-100 mb-3" style="height: auto; border-radius: 20px; overflow:hidden">
            <img src="{{ asset('img/Lap1.jpg') }}" style=" width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="mb-3">
            <h4>HSF Gresik Kota Industri</h4>
            <a>Jl.Nin Aja Dulu</a>
        </div>
        <div>
            <button class="accordion">Pilih Lapangan</button>
            <div class="panel">
                <br>
                <p>Sintetis</p>
                <div class="panel-lapangan">
                    <img src="{{ asset('img/Lap1.jpg') }}"
                        style=" width: 80px; height: 50px; object-fit: cover; border-radius: 10px;">
                    <b>Lapangan A</b>
                </div>
                <p>Semen</p>

            </div>

            <button class="accordion">Pilih Tanggal</button>
            <div class="panel">
                <input type="date" id="date" value="">
            </div>

            <button class="accordion">Pilih Jam</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <div>
            <button class="redButton">Lanjut Pembayaran</button>
        </div>
    </div>
</div>
@endsection