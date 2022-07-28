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
Route::group(['middleware'=>['auth','CheckRole:admin']], function(){
Route::resource('/kelurahan',App\Http\Controllers\KelurahanController::class);
Route::get('api/kelurahan',[App\Http\Controllers\KelurahanController::class,'apikelurahan']);
Route::resource('/pasien',App\Http\Controllers\PasienController::class);
Route::get('api/pasien',[App\Http\Controllers\PasienController::class,'apipasien']);
Route::get('print/{pasien}',[App\Http\Controllers\PasienController::class,'print']);
Route::resource('/user',App\Http\Controllers\UserController::class);
Route::get('api/user',[App\Http\Controllers\UserController::class,'api']);
});
Route::group(['middleware'=>['auth','CheckRole:operator']], function(){
Route::resource('/pasien',App\Http\Controllers\PasienController::class);
Route::get('api/pasien',[App\Http\Controllers\PasienController::class,'apipasien']);
Route::get('print/{pasien}',[App\Http\Controllers\PasienController::class,'print']);
});
Auth::routes();


