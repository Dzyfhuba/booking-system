<?php

namespace App\Http\Controllers;

use App\Models\JLapangan;
use App\Models\Lapangan as ModelsLapangan;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lapangan;
use PDO;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    public function index()
    {

        $lapangan = ModelsLapangan::join('lapangan.id', '=', 'jenis_lapangan.id')
            ->select()->where('id_provider', Auth::id())->first();
        return view('provider.list','lapangan', 'data', [
            'lapangan' => $lapangan
        ]);
    }
    public function register()
    {
        return view('provider.register');
    }
    public function register_post(Request $request)
    {
        $data = $request;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('provider');
        event(new Registered($user));
        return redirect()->route('home');
    }


    public function list()
    {
        $lapangan = ModelsLapangan::all();
        return view('provider.list', [
            'lapangan' => $lapangan
        ]);
    }


    public function history()
    {
        return view('provider.history');
    }
    public function add()
    {
        return view('provider.add');
    }
    public function save(Request $data)
    {
        $file = $data->file('fotolapangan');
        $ext = $file->getClientOriginalExtension();
        $filename = $data['namalapangan'] . '.' . $ext;
        $file->move('../storage/files/', $filename);
        $sessid = Auth::id();
        ModelsLapangan::create([
            'nama_lapangan' => $data['namalapangan'],
            'jenis_lapangan' => $data['jenislapangan'],
            'luas_lapangan' => $data['luaslapangan'],
            'tarif_perjam' => $data['tariflapangan'],
            'foto_lapangan' => $data['fotolapangan'],
            'id_provider' => $sessid
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $del = DB::delete('delete from lapangan where id = ?', [$id]);
        return view('provider.list');
    }
}
