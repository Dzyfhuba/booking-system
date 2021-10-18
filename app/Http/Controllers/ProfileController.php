<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
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
        return view('profile',[
            'user' => $user,
            'userdetail' => $userdetail
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
        return redirect()->back();
    }
}
