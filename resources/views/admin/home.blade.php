<style>
    .verifikasi {}

    .verifikasi .menu .a-link {
        text-decoration: none;
        margin-right: 30px;
        display: inline-block;
        position: relative;
        padding: 0px 5px;
    }

    .verifikasi .menu-2 .a-link:after {
        background: none repeat scroll 0 0 transparent;
        bottom: 0;
        content: "";
        display: block;
        height: 2px;
        left: 50%;
        position: absolute;
        background: #dc3545;
        transition: width 0.3s ease 0s, left 0.3s ease 0s;
        width: -50%;
    }

    .verifikasi .menu-2 .a-link:hover:after {
        width: 100%;
        left: 0;
    }

    .a-linkactive {
        color: #dc3545;
    }

    .verifikasi .menu-2 .a-linkactive:after {
        width: 100% !important;
        left: 0 !important;
    }

    .verifikasi button {
        margin: 5px;
        padding: 10px 20px;
        border-radius: 10px;
    }

    .verifikasi table td,
    th {
        padding: 5px 20px;
    }

    .accordion button {
        margin: 0px 10px;
    }

</style>

<div class="verifikasi">
    <div class="d-flex menu mb-4">
        <a href="{{ route('home') }}">
            <h3 class="a-link akun {{ Route::currentRouteName() == 'home' ? 'a-linkactive' : '' }}">Verifikasi
                Pembayaran</h3>
        </a>
        <a href="{{ route('verifikasi.lapangan') }}">
            <h3 class="a-link akun {{ Route::currentRouteName() == 'verifikasi.lapangan' ? 'a-linkactive' : '' }}">
                Verifikasi Lapangan</h3>
        </a>
    </div>
</div>
<div class="" style="height: 70vh; overflow-y: auto">
    @if (Route::currentRouteName() == 'home')
        @for ($i = 0; $i < 4; $i++)
            <div class="accordion">
                <div class="row align-items-center">
                    <div class="col-lg-2">Jhon Doe</div>
                    <div class="col-lg-2"><a>HSF Gresik</a><br><a>Lapangan A</a></div>
                    <div class="col-lg-2">08:00-09:00 02/02/2020</div>
                    <div class="col-lg-2">Rp. 50.000</div>
                    <div class="col-lg-1"><a href="">Bukti transfer</a></div>
                    <div class="col-lg-3 d-flex justify-content-end"><button class="col-5">Cancel</button><button class="col-5">Verifikasi</button>
                    </div>
                </div>
            </div>
        @endfor
    @endif

    @yield('verify')


</div>
