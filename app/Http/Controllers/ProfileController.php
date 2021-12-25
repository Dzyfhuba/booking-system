<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\provider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::select()->where('email', Auth::user()->email)->first(); 
        $userdetail = UserDetail::select()->where('email', Auth::user()->email)->first();
        $provider = provider::select()->where('email', Auth::user()->email)->first();
        return view('profile',[
            'user' => $user,
            'userdetail' => $userdetail,
            'provider' => $provider
        ]);
    }
    public function save(Request $request){
        // $this->validate($request, [
        //     'fotoktp' => 'required|file|image|mimes:jpeg,jpg,png|max:2048',
        //     'email' => 'required',
        //     'namalengkap' => 'required',
        //     'alamat' => 'required',
        //     'ttl' => 'required',
        //     'nohp' => 'required',
        // ]);
        $file = $request->file('fotoktp');
        $ext = $file->getClientOriginalExtension();
        $filename = $request->email.'.'.$ext;
        $file->move('../storage/files/', $filename);
        UserDetail::where('email', $request->email)
        ->update([
            'email'=>$request->email,
            'namalengkap'=>$request->namalengkap,
            'alamat'=>$request->alamat,
            'ttl'=>$request->ttl,
            'nohp'=>$request->nohp,
            'fotoktp'=>$request->email.'.'.$ext
        ]);
        User::where('email', $request->email)->update([
            'name' =>$request->namalengkap,
            'email' => $request->email
        ]);
        return redirect()->back();
    }


    public function save_provider(Request $request){
        User::where('email', $request->email)->update([
            'name' =>$request->nama_tempat,
            'email' => $request->email
        ]);
        provider::where('email', $request->email)->update([
            'nama_tempat' => $request->nama_tempat,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request-> alamat,
        ]);
        return redirect()->back();

    }
}
