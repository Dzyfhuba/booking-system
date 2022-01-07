<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\manajemenakun;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JLapangan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::post('/provider/register/post', [RegisterController::class, 'register'])->name('provider_register');
Route::get('/provider/register', [ProviderController::class, 'register'])->name('provider_register_page');

Route::group(['middleware' => ['auth', 'verified', 'role:user']], function () {
    Route::get('/user', [function () {
        return 'aaa';
    }]);
});


//Dash-Provider--List
Route::get('/provider/list', function () {
    $sessid = Auth::id();
    $lapangan = DB::select('select l.id, l.nama_lapangan, jl.jenis_lapangan, l.luas_lapangan, l.tarif_perjam from lapangan l, jenis_lapangan jl
    where l.jenis_lapangan = jl.id');
    return view('provider.list', ['lapangan' => $lapangan]);
})->name('provider.list');

Route::delete('/provider/delete/{id}', function ($id) {
    DB::delete('delete from lapangan where id = ?', [$id]);
    return view('provider.list');
})->name('provider.delete');

Route::get('/provider/add', function () {
    $data = DB::select('select * from jenis_lapangan');
    return view('provider.add', ['data' => $data]);
})->name('provider.add');

// Route::get('/provider/list', [ProviderController::class, 'list'])->name('provider.list');
Route::get('/provider/history', [ProviderController::class, 'history'])->name('provider.history');
// Route::get('/provider/add', [ProviderController::class, 'add'])->name('provider.add');
Route::post('/provider/add/post', [ProviderController::class, 'save'])->name('provider.save');
// Route::get('/provider/list/delete/{id}', [ProviderController::class, 'delete'])->name('provider.delete');
//


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/save', [ProfileController::class, 'save'])->name('profile.save');
    Route::post('/profile/save/provider', [ProfileController::class, 'save_provider'])->name('profile.save.provider');
});


// ADMIN
Route::middleware(['auth'])->group(function () {
    Route::get('/manajemen-akun', [AdminController::class, 'manajemenAkun'])->name('manajemen-akun');
    Route::get('/manajemen-akun/provider/banned', [AdminController::class, 'providerBanned'])->name('manajemen-akun.provider.banned');
    Route::get('/manajemen-akun/provider/verifikasi', [AdminController::class, 'providerVerifikasi'])->name('manajemen-akun.provider.verifikasi');

    // Route::group(['middleware' => ['auth', 'admin']], function () {
    // });
    Route::get('/manajemen-akun/user', [AdminController::class, 'manajemenAkunUser'])->name('manajemen-akun.user');
    Route::get('/manajemen-akun/user/banned', [AdminController::class, 'userBanned'])->name('manajemen-akun.user.banned');

    Route::get('/tiket', [AdminController::class, 'tiket'])->name('tiket');
    Route::get('/riwayat', [AdminController::class, 'riwayat'])->name('riwayat');

    Route::get('/verifikasi/lapangan', [AdminController::class, 'verifikasiLapangan'])->name('verifikasi.lapangan');
});


// USER
Route::middleware(['auth'])->group(function () {
    Route::get('/my/pembayaran', [UserController::class, 'pembayaran'])->name('user.pembayaran');
    Route::get('/my/riwayat', [UserController::class, 'riwayat'])->name('user.riwayat');
});
