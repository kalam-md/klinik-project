<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PendaftaranPasienController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SpesialisKeluhanController;
use App\Models\JadwalDokter;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome', [
        'jadwals' => JadwalDokter::all()
    ]);
});

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda')->middleware('auth');

// autentikasi
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
    // keluhan
    Route::get('/keluhan', [SpesialisKeluhanController::class, 'keluhan'])->name('keluhan');
    Route::get('/keluhan/tambah', [SpesialisKeluhanController::class, 'keluhanCreate'])->name('keluhan.tambah');
    Route::post('/keluhan', [SpesialisKeluhanController::class, 'keluhanStore'])->name('keluhan.store');
    Route::get('/keluhan/{slug}/edit', [SpesialisKeluhanController::class, 'keluhanEdit'])->name('keluhan.edit');
    Route::put('/keluhan/{slug}', [SpesialisKeluhanController::class, 'keluhanUpdate'])->name('keluhan.update');
    Route::delete('/keluhan/{slug}', [SpesialisKeluhanController::class, 'keluhanDestroy'])->name('keluhan.destroy');
    // spesialis
    Route::get('/spesialis', [SpesialisKeluhanController::class, 'spesialis'])->name('spesialis');
    Route::get('/spesialis/tambah', [SpesialisKeluhanController::class, 'spesialisCreate'])->name('spesialis.tambah');
    Route::post('/spesialis', [SpesialisKeluhanController::class, 'spesialisStore'])->name('spesialis.store');
    Route::get('/spesialis/{slug}/edit', [SpesialisKeluhanController::class, 'spesialisEdit'])->name('spesialis.edit');
    Route::put('/spesialis/{slug}', [SpesialisKeluhanController::class, 'spesialisUpdate'])->name('spesialis.update');
    Route::delete('/spesialis/{slug}', [SpesialisKeluhanController::class, 'spesialisDestroy'])->name('spesialis.destroy');
    // dokter
    Route::get('/dokter', [DokterController::class, 'dokter'])->name('dokter');
    Route::get('/dokter/tambah', [DokterController::class, 'dokterCreate'])->name('dokter.tambah');
    Route::post('/dokter', [DokterController::class, 'dokterStore'])->name('dokter.store');
    Route::get('/dokter/{slug}/edit', [DokterController::class, 'dokterEdit'])->name('dokter.edit');
    Route::put('/dokter/{slug}', [DokterController::class, 'dokterUpdate'])->name('dokter.update');
    Route::delete('/dokter/{slug}', [DokterController::class, 'dokterDestroy'])->name('dokter.destroy');
    // jadwal dokter
    Route::get('/jadwal-dokter', [DokterController::class, 'jadwal_dokter'])->name('jadwal-dokter');
    Route::get('/jadwal-dokter/tambah', [DokterController::class, 'jadwalCreate'])->name('jadwal-dokter.tambah');
    Route::post('/jadwal-dokter', [DokterController::class, 'jadwalStore'])->name('jadwal-dokter.store');
    Route::get('/jadwal-dokter/{slug}/edit', [DokterController::class, 'jadwalEdit'])->name('jadwal-dokter.edit');
    Route::put('/jadwal-dokter/{slug}', [DokterController::class, 'jadwalUpdate'])->name('jadwal-dokter.update');
    Route::delete('/jadwal-dokter/{slug}', [DokterController::class, 'jadwalDestroy'])->name('jadwal-dokter.destroy');
});

Route::middleware(['auth', 'role:admin,pasien'])->group(function () {
    Route::get('/pendaftaran-pasien', [PendaftaranPasienController::class, 'index'])->name('pendaftaran-pasien');
    Route::get('/pendaftaran-pasien/tambah', [PendaftaranPasienController::class, 'create'])->name('pendaftaran-pasien.tambah');
    Route::post('/pendaftaran-pasien', [PendaftaranPasienController::class, 'store'])->name('pendaftaran-pasien.store');
    Route::get('/pendaftaran-pasien/{slug}/print', [PendaftaranPasienController::class, 'printSuratKeterangan'])->name('pendaftaran-pasien.print');
    Route::get('/pendaftaran-pasien/{slug}/detail', [PendaftaranPasienController::class, 'show'])->name('pendaftaran-pasien.detail');
    Route::get('/pendaftaran-pasien/{slug}/edit', [PendaftaranPasienController::class, 'edit'])->name('pendaftaran-pasien.edit');
    Route::put('/pendaftaran-pasien/{slug}', [PendaftaranPasienController::class, 'update'])->name('pendaftaran-pasien.update');
    Route::delete('/pendaftaran-pasien/{slug}', [PendaftaranPasienController::class, 'destroy'])->name('pendaftaran-pasien.destroy');
});
