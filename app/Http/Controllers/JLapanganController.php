<?php

namespace App\Http\Controllers;

use App\Models\JLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JLapanganController extends Controller
{
    public function index()
    {
        $data = DB::select('select * from jenis_lapangan');
        dd();
        return view('provider.add', ['data' => $data]);    }
}
