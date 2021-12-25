<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\provider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function manajemenAkun(){
        return view('admin.manajemen-akun', [
            'provider' => provider::all()
        ]);
    }

    

    public function manajemenAkunUser(){
        // $user = User::select()->where('email', Auth::user()->email)->first(); 
        // $userdetail = UserDetail::select()->where('email', Auth::user()->email)->first();

        return view('admin.manajemen-akun-user', [
            'user' => User::all(),
            'userdetail' => UserDetail::all()
        ]);
    }
    public function providerBanned(){
        return view('admin.manajemen-akun.provider-banned');
    }

    public function providerVerifikasi(){
        return view('admin.manajemen-akun.provider-verifikasi');
    }

    public function userBanned(){
        return view('admin.user-banned');
    }

    public function home(){
        return view('admin.home');
    }
    

    public function verifikasiLapangan(){
        return view('admin.verifikasi.verifikasi-lapangan');
    }

    public function tiket(){
        return view('admin.tiket');
    }

    public function riwayat(){
        return view("admin.riwayat");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
