@role('admin')
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

            .accordion::before {
                content: '\002B';
                color: #777;
                font-weight: bold;
                float: left !important;
                margin-right: 5px;
            }

            .active::before {
                content: "\2212";
            }



            .manajemen-akun .menu .a-link {
                text-decoration: none;
                margin-right: 30px;
                display: inline-block;
                position: relative;
                padding: 0px 5px;
            }

            .manajemen-akun .menu-2 .a-link:after {
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

            .manajemen-akun .menu-2 .a-link:hover:after {
                width: 100%;
                left: 0;
            }

            .a-linkactive {
                color: #dc3545;
            }

            .manajemen-akun .menu-2 .a-linkactive:after {
                width: 100% !important;
                left: 0 !important;
            }

            .manajemen-akun button {
                margin: 5px;
                padding: 10px 20px;
                border-radius: 5px;
            }

            .manajemen-akun table td,
            th {
                padding: 5px 5px;
            }

        </style>

        <div class="manajemen-akun">
            <div class="d-flex menu mb-4">
                <a href="{{ route('manajemen-akun') }}">
                    <h3 class="a-link akun {{ Route::currentRouteName() == 'manajemen-akun' ? 'a-linkactive' : '' }}">
                        Provider</h3>
                </a>
                <a href="{{ route('manajemen-akun.user') }}">
                    <h3 class="a-link akun {{ strpos(url()->current(), '/manajemen-akun/user') ? 'a-linkactive' : '' }}">User
                    </h3>
                </a>
            </div>
            @yield('contentUser')

            @if (Route::currentRouteName() == 'manajemen-akun' || strpos(url()->current(), '/manajemen-akun/provider'))
                <div class="d-flex menu menu-2">
                    <div>
                        <a href="{{ route('manajemen-akun') }}" class="a-link {{ Route::currentRouteName() == 'manajemen-akun' ? 'a-linkactive' : '' }}">List</a>
                    </div>
                    <div>
                        <a href="{{ route('manajemen-akun.provider.banned') }}" class="a-link {{ strpos(url()->current(), '/manajemen-akun/provider/banned') ? 'a-linkactive' : '' }}">Banned</a>
                    </div>
                    <div>
                        <a href="{{ route('manajemen-akun.provider.verifikasi') }}" class="a-link {{ strpos(url()->current(), '/manajemen-akun/provider/verifikasi') ? 'a-linkactive' : '' }}">Verifikasi</a>
                    </div>
                </div>

                <div class="py-3">
                    @if (Route::currentRouteName() == 'manajemen-akun')
                        @foreach ($provider as $provider)
                            <div class="bg-white">
                                <div style="float: right;" class="">
                                    <button>WARNING</button>
                                    <button>BANNED</button>
                                    <button>ROLE</button>
                                    <button>REMOVE</button>
                                </div>
                                <div class="accordion ">
                                    <div class="d-flex justify-content-md-between">
                                        <a>{{ $provider->nama_tempat }}</a>
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
                                                    <div class="col-md-4 col-6">Nama Tempat</div>
                                                    <div class="col-md-8 col-6">
                                                        <p>{{ $provider->nama_tempat }}</p>
                                                    </div>
                                                    <div class="col-md-4 col-6">Nomor Telpon</div>
                                                    <div class="col-md-8 col-6">
                                                        <p>{{ $provider->nohp }}</p>
                                                    </div>
                                                    <div class="col-md-4 col-6">Alamat Lengkap</div>
                                                    <div class="col-md-8 col-6">
                                                        <p>{{ $provider->alamat }}</p>
                                                    </div>
                                                    <div class="col-md-4 col-6">Email</div>
                                                    <div class="col-md-8 col-6">
                                                        <p>{{ $provider->email }}</p>
                                                    </div>
                                                    <div class="col-md-4 col-6">Bukti Surat Usaha</div>
                                                    <div class="col-md-8 col-6">
                                                        <div>
                                                            <img style="background-color: grey; height: 100px; width:100px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <h3>List Lapangan</h3>
                                            <div>
                                                <table>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Jenis</th>
                                                        <th>Luas</th>
                                                        <th>Harga / jam</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Lapangan A</td>
                                                        <td>Sintetis</td>
                                                        <td>34x18m</td>
                                                        <td><a>Rp.</a><a>50.000</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lapangan A</td>
                                                        <td>Sintetis</td>
                                                        <td>34x18m</td>
                                                        <td><a>Rp.</a><a>50.000</a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif

                    
                </div>
            @endif

            @yield('providerCategory')

        </div>


        <script>
            $(".akun").click(function() {
                $(".akun").removeClass("a-linkactive");
                $(this).addClass("a-linkactive")
            })

            var acc = document.getElementsByClassName("accordion");

            for (var i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    // for (j = 0; j < acc.length; j++) {
                    //     var pan = acc[j].nextElementSibling;
                    //     pan.style.maxHeight = null;
                    // }
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }
        </script>
    @endsection
@endrole
