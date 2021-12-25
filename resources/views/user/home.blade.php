<h3>List lapangan</h3>

<div>
    <div class="h-100 py-3">
        <div class="h-100" style="overflow-y: auto;">

            @for ($i=0; $i < 3; $i++)
            <div class="container-fluid p-3 mb-3 card-lapangan" style="border-radius: 20px;" id="Lapangan1">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="me-3"
                            style="width: 128px; height: 72px; overflow: hidden; border-radius: 10px">
                            <img src="{{ asset('img/Lap1.jpg') }}"
                                style=" width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4>HSF Gresik Kota Industri</h4>
                        <a>Jl.Nin Aja Dulu</a><br>
                    </div>
                    <div class="col-lg-3 d-flex justify-content-between text-center">
                        <div>
                            <a>Jumlah Lapangan</a><br>
                            <b>4</b>
                        </div>
                        <div>
                            <a>Start from</a><br>
                            <b>100k/jam</b>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center justify-content-end">
                        <button class="btn btn-danger px-4 py-2 fw-bold" style=" border-radius: 30px;">
                            Booking
                        </button>
                    </div>
                </div>
            </div>
            @endfor
            
        </div>
    </div>
</div>
