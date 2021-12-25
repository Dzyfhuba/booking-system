@extends('layouts.app')

@section('content')
    <h3>Tagihan</h3>
    <div class="accordion">
        <div class="row align-items-center">
            <div class="col-lg-2">HSF Gresik</div>
            <div class="col-lg-2">Lapangan A</div>
            <div class="col-lg-1">02/02/2020</div>
            <div class="col-lg-1">08:00-16:00</div>
            <div class="col-lg-1">-</div>
            <div class="col-lg-1">Uang Muka</div>
            <div class="col-lg-1">Rp. 50.000</div>
            <div class="col-lg-1">Menunngu pembayaran</div>
            <div class="col-lg-2 "><button>Cancel</button><button>Bayar</button></div>
        </div>
    </div>
    <div class="accordion">
        <div class="row align-items-center">
            <div class="col-lg-2">HSF Gresik</div>
            <div class="col-lg-2">Lapangan B</div>
            <div class="col-lg-1">02/01/2020</div>
            <div class="col-lg-1">08:00-16:00</div>
            <div class="col-lg-1">-</div>
            <div class="col-lg-1">Uang Muka</div>
            <div class="col-lg-1">Rp. 50.000</div>
            <div class="col-lg-1">Selesai</div>
            <div class="col-lg-2 d-flex justify-content-end"><button>Invoice</button></div>
        </div>
    </div>

@endsection
