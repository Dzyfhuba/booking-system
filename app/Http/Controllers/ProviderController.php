<?php

namespace App\Http\Controllers;

use App\Models\provider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function register()
    {
        return view('provider.register');
    }
    public function register_post(Request $request)
    {
        $data = $request;
        $user = provider::create([
            'nama_tempat' => $data['nama_tempat'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nohp' => $data['nohp'],
            'alamat' => $data['alamat'],
            'bukti_kepemilikan' => ['bukti_kepemilikan']
        ]);

        $user->assignRole('provider');
        event(new Registered($user));
        return redirect()->route('home');
    }
    public function list()
    {
        return view('provider.list');
    }
    public function history()
    {
        return view('provider.history');
    }
}
