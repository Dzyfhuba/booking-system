<?php

namespace App\Http\Controllers;

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
        return view('provider.list');
    }
    public function history()
    {
        return view('provider.history');
    }
}
