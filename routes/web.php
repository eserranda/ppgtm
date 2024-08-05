<?php

use App\Models\PengurusJemaat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\KlasisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalIbadahController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\PengurusJemaatController;
use App\Http\Controllers\PengurusKlasisController;
use App\Http\Controllers\PengurusSinodeController;
use App\Http\Controllers\WilayahPelayananController;
use App\Http\Controllers\ProgramKerjaJemaatController;
use App\Http\Controllers\ProgramKerjaKlasisController;
use App\Http\Controllers\AnggotaPemudaJemaatController;

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

Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index')->middleware('role:super_admin');
    Route::post('/register', 'register');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
});

Route::prefix('roles')->controller(RoleController::class)->group(function () {
    Route::get('/', 'index')->name('roles.index')->middleware('role:super_admin');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
    Route::get('/getAllRoles', 'getAllRoles');
    Route::get('/getUserRoles/{id}', 'getUserRoles');
});
// sementara
Route::get('/', [DashboardController::class, 'home'])->middleware('auth');


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


Route::prefix('jadwal-ibadah')->controller(JadwalIbadahController::class)->group(function () {
    Route::get('/', 'index')->name('jadwal-ibadah.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
})->middleware('auth');

Route::prefix('pengurus-jemaat')->controller(PengurusJemaatController::class)->group(function () {
    Route::get('/', 'index')->name('pengurus-jemaat.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
})->middleware('auth');

Route::prefix('pengurus-klasis')->controller(PengurusKlasisController::class)->group(function () {
    Route::get('/', 'index')->name('pengurus-klasis.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
})->middleware('auth');

Route::prefix('pengurus-sinode')->controller(PengurusSinodeController::class)->group(function () {
    Route::get('/', 'index')->name('pengurus-sinode.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
})->middleware('auth');

Route::prefix('anggota-pemuda-jemaat')->controller(AnggotaPemudaJemaatController::class)->group(function () {
    Route::get('/', 'index')->name('anggota-pemuda-jemaat.index');
    Route::post('/store', 'store');
    Route::get('/findById/{id}', 'findById');
    Route::post('/update', 'update');
    Route::delete('/destroy/{id}', 'destroy');
})->middleware('auth');

Route::prefix('program-kerja-klasis')->controller(ProgramKerjaKlasisController::class)->group(function () {
    Route::get('/', 'index')->name('program-kerja-klasis.index');
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
    Route::get('/findOne/{id}', 'findOne');
    // Route::get('/getIdAndNameAllKlasis', 'getIdAndNameAllKlasis');
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
