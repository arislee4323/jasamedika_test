<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/kelurahan',App\Http\Controllers\KelurahanController::class);
Route::get('api/kelurahan',[App\Http\Controllers\KelurahanController::class,'apikelurahan']);
Route::resource('/pasien',App\Http\Controllers\PasienController::class);
Route::get('api/pasien',[App\Http\Controllers\PasienController::class,'apipasien']);
Auth::routes();

