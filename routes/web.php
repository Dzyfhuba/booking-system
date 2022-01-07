<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Models\Lapangan;
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

Route::post('/provider/register/post', [RegisterController::class, 'register'])->name('provider_register');
Route::get('/provider/register', [ProviderController::class, 'register']);

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
});
