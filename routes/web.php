<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::post('/provider/register/post', [ProviderController::class, 'register_post'])->name('provider_register');
Route::get('/provider/register', [ProviderController::class, 'register']);

Route::group(['middleware' => ['auth', 'verified', 'role:user']], function () {
    Route::get('/user', [function () {
        return 'asd';
    }]);
});