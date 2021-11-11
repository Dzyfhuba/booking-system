<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;

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
Route::get('/provider/register', [ProviderController::class, 'register'])->name('provider_register_page');

Route::group(['middleware' => ['auth', 'verified', 'role:user']], function () {
    Route::get('/user', [function () {
        return 'aaa';
    }]);
});

Route::get('/provider/list', [ProviderController::class, 'list'])->name('provider.list');
Route::get('/provider/history', [ProviderController::class, 'history'])->name('provider.history');
Route::get('/provider/add', [ProviderController::class, 'add'])->name('provider.add');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/save', [ProfileController::class, 'save'])->name('profile.save');
});
