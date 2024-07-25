<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KlasisController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\WilayahPelayananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [UserController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [UserController::class, 'login'])->middleware('guest');

Route::get('logout', [UserController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('program-kerja')->controller(ProgramKerjaController::class)->group(function () {
    Route::get('/', 'index')->name('program-kerja.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
    Route::get('/get-all-klasis', 'getAllKlasis');
});

Route::prefix('klasis')->controller(KlasisController::class)->group(function () {
    Route::get('/', 'index')->name('klasis.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
    Route::get('/get-all-klasis', 'getAllKlasis');
});

Route::prefix('wilayah-pelayanan')->controller(WilayahPelayananController::class)->group(function () {
    // Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'index')->name('wilayah-pelayanan.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
    // });
});
