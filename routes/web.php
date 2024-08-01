<?php

use App\Http\Controllers\AnggotaPemudaJemaatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\KlasisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\WilayahPelayananController;
use App\Http\Controllers\ProgramKerjaJemaatController;

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


// Route::get('/', function () {
//     return view('welcome');
// });

// sementara
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');


Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index')->middleware('auth');
    Route::post('/register', 'register');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
})->middleware('auth');

Route::prefix('/dashboard')->controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboards.index');
})->middleware('auth');


Route::prefix('anggota-pemuda-jemaat')->controller(AnggotaPemudaJemaatController::class)->group(function () {
    Route::get('/', 'index')->name('anggota-pemuda-jemaat.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
})->middleware('auth');

Route::prefix('program-kerja-jemaat')->controller(ProgramKerjaJemaatController::class)->group(function () {
    Route::get('/', 'index')->name('program-kerja-jemaat.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
})->middleware('auth');

Route::prefix('program-kerja')->controller(ProgramKerjaController::class)->group(function () {
    Route::get('/', 'index')->name('program-kerja.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
    Route::get('/get-all-klasis', 'getAllKlasis');
})->middleware('auth');

Route::prefix('jemaat')->controller(JemaatController::class)->group(function () {
    Route::get('/', 'index')->name('jemaat.index')->middleware('auth');
    Route::get('/create', 'create');
    Route::get('/findById/{id}', 'findById');
    Route::post('/store', 'store');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
    Route::get('/getIdAndNameAllKlasis', 'getIdAndNameAllKlasis');
    Route::get('/getAllJemaat', 'getAllJemaat');
    Route::get('/findOne/{id}', 'findOne');
});

Route::prefix('klasis')->controller(KlasisController::class)->group(function () {
    Route::get('/', 'index')->name('klasis.index')->middleware('auth');
    Route::get('/create', 'create');
    Route::get('/findById/{id}', 'findById');
    Route::post('/store', 'store');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
    Route::get('/getAllKlasis', 'getAllKlasis');
    // Route::get('/getIdAndNameAllKlasis', 'getIdAndNameAllKlasis');
    Route::get('/findOne/{id}', 'findOne');
});

Route::prefix('wilayah-pelayanan')->controller(WilayahPelayananController::class)->group(function () {
    // Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'index')->name('wilayah-pelayanan.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
    // });
})->middleware('auth');
