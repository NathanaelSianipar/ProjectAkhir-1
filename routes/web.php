<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KhotbahController;
use App\Http\Controllers\ProfilController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/admin.home', function () {
        return view('admin.home');
    })->name('welcome');

Route::get('/Kontaks.index', [KontakController::class, 'index'])->name('kontaks.index');
Route::get('/Kontaks.create', [KontakController::class, 'create'])->name('kontaks.create');
Route::post('/Kontaks.store', [KontakController::class, 'store'])->name('kontaks.store');
Route::get('/Kontaks.destroy/{id}', [KontakController::class, 'destroy'])->name('kontaks.destroy');
Route::get('/Kontaks.show/{id}', [KontakController::class, 'show'])->name('kontaks.show');
Route::get('/Kontaks.edit/{id}', [KontakController::class, 'edit'])->name('kontaks.edit');
Route::put('/Kontaks.update/{id}', [KontakController::class, 'update'])->name('kontaks.update');

Route::get('/Tentang.index', [TentangController::class, 'index'])->name('tentang.index');
Route::get('/Tentang.create', [TentangController::class, 'create'])->name('tentang.create');
Route::post('/Tentang.store', [TentangController::class, 'store'])->name('tentang.store');
Route::get('/Tentang.destroy/{id}', [TentangController::class, 'destroy'])->name('tentang.destroy');
Route::get('/Tentang.show/{id}', [TentangController::class, 'show'])->name('tentang.show');
Route::get('/Tentang.edit/{id}', [TentangController::class, 'edit'])->name('tentang.edit');
Route::put('/Tentang.update/{id}', [TentangController::class, 'update'])->name('tentang.update');

Route::get('/Jadwals.index', [JadwalController::class, 'index'])->name('jadwals.index');
Route::get('/Jadwals.create', [JadwalController::class, 'create'])->name('jadwals.create');
Route::post('/Jadwals.store', [JadwalController::class, 'store'])->name('jadwals.store');
Route::get('/Jadwals.destroy/{id}', [JadwalController::class, 'destroy'])->name('jadwals.destroy');
Route::get('/Jadwals.show/{id}', [JadwalController::class, 'show'])->name('jadwals.show');
Route::get('/Jadwals.edit/{id}', [JadwalController::class, 'edit'])->name('jadwals.edit');
Route::put('/Jadwals.update/{id}', [JadwalController::class, 'update'])->name('jadwals.update');

Route::get('/Pelayanan.index', [PelayananController::class, 'index'])->name('pelayanan.index');
Route::get('/Pelayanan.create', [PelayananController::class, 'create'])->name('pelayanan.create');
Route::post('/Pelayanan.store', [PelayananController::class, 'store'])->name('pelayanan.store');
Route::get('/Pelayanan.destroy/{id}', [PelayananController::class, 'destroy'])->name('pelayanan.destroy');
Route::get('/Pelayanan.show/{id}', [PelayananController::class, 'show'])->name('pelayanan.show');
Route::get('/Pelayanan.edit/{id}', [PelayananController::class, 'edit'])->name('pelayanan.edit');
Route::put('/Pelayanan.update/{id}', [PelayananController::class, 'update'])->name('pelayanan.update');

Route::get('/Galeris.index', [GaleriController::class, 'index'])->name('galeris.index');
Route::get('/Galeris.create', [GaleriController::class, 'create'])->name('galeris.create');
Route::post('/Galeris.store', [GaleriController::class, 'store'])->name('galeris.store');
Route::get('/Galeris.destroy/{id}', [GaleriController::class, 'destroy'])->name('galeris.destroy');
Route::get('/Galeris.show/{id}', [GaleriController::class, 'show'])->name('galeris.show');
Route::get('/Galeris.edit/{id}', [GaleriController::class, 'edit'])->name('galeris.edit');
Route::put('/Galeris.update/{id}', [GaleriController::class, 'update'])->name('galeris.update');

Route::get('/Khotbah.index', [KhotbahController::class, 'index'])->name('khotbah.index');
Route::get('/Khotbah.create', [KhotbahController::class, 'create'])->name('khotbah.create');
Route::post('/Khotbah.store', [KhotbahController::class, 'store'])->name('khotbah.store');
Route::get('/Khotbah.destroy/{id}', [KhotbahController::class, 'destroy'])->name('khotbah.destroy');
Route::get('/Khotbah.show/{id}', [KhotbahController::class, 'show'])->name('khotbah.show');
Route::get('/Khotbah.edit/{id}', [KhotbahController::class, 'edit'])->name('khotbah.edit');
Route::put('/Khotbah.update/{id}', [KhotbahController::class, 'update'])->name('khotbah.update');

Route::get('/Profil.index', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/Profil.create', [ProfilController::class, 'create'])->name('profil.create');
Route::post('/Profil.store', [ProfilController::class, 'store'])->name('profil.store');
Route::get('/Profil.destroy/{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');
Route::get('/Profil.show/{id}', [ProfilController::class, 'show'])->name('profil.show');
Route::get('/Profil.edit/{id}', [ProfilController::class, 'edit'])->name('profil.edit');
Route::put('/Profil.update/{id}', [ProfilController::class, 'update'])->name('profil.update');
});

Route::get('/Tentang', function () {
        return view('User.Tentang.TentangKami');
    })->name('user.tentang');

    Route::get('/Jadwal', function () {
        return view('Jadwal.Jadwal');
    })->name('user.jadwal');

    Route::get('/Galeri', function () {
        return view('Galeri.Galeri');
    })->name('user.galeri');

    Route::get('/Khotbah', function () {
        return view('Khotbah.Khotbah');
    })->name('user.khotbah');

    Route::get('/Pelayanan', function () {
        return view('Pelayanan.Pelayanan');
    })->name('user.pelayanan');

    Route::get('/Kontak', function () {
        return view('Kontak.kontak');
    })->name('user.kontak');

    Route::get('/Jemaat', function () {
        return view('Jemaat.DaftarJemaat');
    })->name('user.jemaat');

    Route::get('/Gereja', function () {
        return view('gereja');
    })->name('user.gereja');

    Route::get('/Ibadah', function () {
        return view('ibadah');
    })->name('user.ibadah');

    Route::get('/cg', function () {
        return view('cg');
    })->name('user.cg');

    Route::get('/terhubung', function () {
        return view('terhubung');
    })->name('user.terhubung');

    Route::get('/media', function () {
        return view('media');
    })->name('user.media');

    Route::get('/donate', function () {
        return view('donate');
    })->name('user.donate');