@extends('home')
@section('verify')
    @for ($i = 0; $i < 4; $i++)
        <div class="accordion">
            <div class="row align-items-center">
                <div class="col-lg-2">HSF Gresik</div>
                <div class="col-lg-2">Lapangan A</div>
                <div class="col-lg-2">Rumput sintetis</div>
                <div class="col-lg-1">42 x 18</div>
                <div class="col-lg-1">Rp. 50.000</div>
                <div class="col-lg-1"><a href="">foto</a></div>
                <div class="col-lg-3 d-flex justify-content-end"><button class="col-5">Cancel</button><button class="col-5">Verifikasi</button>
                </div>
            </div>
        </div>
    @endfor


@endsection
