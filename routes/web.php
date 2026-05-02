<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\KhotbahController as AdminKhotbahController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;
use App\Http\Controllers\Admin\PelayananController as AdminPelayananController;
use App\Http\Controllers\Admin\TentangController as AdminTentangController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;
use App\Http\Controllers\User\PengumumanController as UserPengumumanController;
use App\Http\Controllers\User\GaleriController as UserGaleriController;
use App\Http\Controllers\User\KhotbahController as UserKhotbahController;
use App\Http\Controllers\User\JadwalController as UserJadwalController;
use App\Http\Controllers\User\TentangController as UserTentangController;
use App\Http\Controllers\User\KontakController as UserKontakController;
use App\Http\Controllers\Pelayanan\PelayananController;
use App\Http\Controllers\Pelayan\BerandaController;   // ← controller baru
use App\Http\Controllers\User\JemaatController;

// ─────────────────────────────────────────────
// AUTH (satu definisi, tanpa duplikat)
// ─────────────────────────────────────────────
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login'])->name('login.perform');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register.perform');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

// ─────────────────────────────────────────────
// ADMIN — super_admin & admin
// ─────────────────────────────────────────────
Route::prefix('admin')->middleware(['auth', 'role:super_admin,admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home');
    })->name('admin.dashboard');

    Route::get('/', function () {
        return view('admin.home');
    })->name('welcome');

    Route::get('/galeri',              [AdminGaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create',       [AdminGaleriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri/store',       [AdminGaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{Galeri}',     [AdminGaleriController::class, 'show'])->name('galeri.show');
    Route::get('/galeri/{Galeri}/edit',[AdminGaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{Galeri}',     [AdminGaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{Galeri}',  [AdminGaleriController::class, 'destroy'])->name('galeri.destroy');

    Route::get('/pelayanan',                   [AdminPelayananController::class, 'index'])->name('admin.pelayanan.index');
    Route::get('/pelayanan/create',            [AdminPelayananController::class, 'create'])->name('admin.pelayanan.create');
    Route::post('/pelayanan/store',            [AdminPelayananController::class, 'store'])->name('admin.pelayanan.store');
    Route::get('/pelayanan/{Pelayanan}',       [AdminPelayananController::class, 'show'])->name('admin.pelayanan.show');
    Route::get('/pelayanan/{pelayanan}/edit',  [AdminPelayananController::class, 'edit'])->name('admin.pelayanan.edit');
    Route::put('/pelayanan/{pelayanan}',       [AdminPelayananController::class, 'update'])->name('admin.pelayanan.update');
    Route::delete('/pelayanan/{pelayanan}',    [AdminPelayananController::class, 'destroy'])->name('admin.pelayanan.destroy');

    Route::get('/tentang',              [AdminTentangController::class, 'index'])->name('tentang.index');
    Route::get('/tentang/create',       [AdminTentangController::class, 'create'])->name('tentang.create');
    Route::post('/tentang/store',       [AdminTentangController::class, 'store'])->name('tentang.store');
    Route::get('/tentang/{Tentang}',    [AdminTentangController::class, 'show'])->name('tentang.show');
    Route::get('/tentang/{tentang}/edit',[AdminTentangController::class, 'edit'])->name('tentang.edit');
    Route::put('/tentang/{tentang}',    [AdminTentangController::class, 'update'])->name('tentang.update');
    Route::delete('/tentang/{Tentang}', [AdminTentangController::class, 'destroy'])->name('tentang.destroy');

    Route::get('/khotbah',              [AdminKhotbahController::class, 'index'])->name('khotbah.index');
    Route::get('/khotbah/create',       [AdminKhotbahController::class, 'create'])->name('khotbah.create');
    Route::post('/khotbah/store',       [AdminKhotbahController::class, 'store'])->name('khotbah.store');
    Route::get('/khotbah/{khotbah}',    [AdminKhotbahController::class, 'show'])->name('khotbah.show');
    Route::get('/khotbah/{khotbah}/edit',[AdminKhotbahController::class, 'edit'])->name('khotbah.edit');
    Route::put('/khotbah/{khotbah}',    [AdminKhotbahController::class, 'update'])->name('khotbah.update');
    Route::delete('/khotbah/{khotbah}', [AdminKhotbahController::class, 'destroy'])->name('khotbah.destroy');

    Route::get('/jadwal',              [AdminJadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/create',       [AdminJadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal/store',       [AdminJadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{Jadwal}',     [AdminJadwalController::class, 'show'])->name('jadwal.show');
    Route::get('/jadwal/{Jadwal}/edit',[AdminJadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{Jadwal}',     [AdminJadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{Jadwal}',  [AdminJadwalController::class, 'destroy'])->name('jadwal.destroy');

    Route::get('/kontak',             [AdminKontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak/create',      [AdminKontakController::class, 'create'])->name('kontak.create');
    Route::post('/kontak/store',      [AdminKontakController::class, 'store'])->name('kontak.store');
    Route::get('/kontak/{kontak}/edit',[AdminKontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak/{kontak}',    [AdminKontakController::class, 'update'])->name('kontak.update');
    Route::delete('/kontak/{kontak}', [AdminKontakController::class, 'destroy'])->name('kontak.destroy');

    Route::get('/profil',        [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil/create', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('/profil',       [ProfilController::class, 'store'])->name('profil.store');
    Route::get('/profil/edit',   [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update');

    Route::get('/pengumuman',                    [AdminPengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/pengumuman/create',             [AdminPengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/pengumuman',                   [AdminPengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/pengumuman/{pengumuman}/edit',  [AdminPengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/pengumuman/{pengumuman}',       [AdminPengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/{pengumuman}',    [AdminPengumumanController::class, 'destroy'])->name('pengumuman.destroy');
});

// ─────────────────────────────────────────────
// SUPER ADMIN ONLY — kelola akun
// ─────────────────────────────────────────────
Route::prefix('admin')->middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/accounts',              [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/accounts/create',       [AccountController::class, 'create'])->name('accounts.create');
    Route::post('/accounts',             [AccountController::class, 'store'])->name('accounts.store');
    Route::get('/accounts/{user}/edit',  [AccountController::class, 'edit'])->name('accounts.edit');
    Route::put('/accounts/{user}',       [AccountController::class, 'update'])->name('accounts.update');
    Route::delete('/accounts/{user}',    [AccountController::class, 'destroy'])->name('accounts.destroy');
});

// ─────────────────────────────────────────────
// PELAYAN — harus login, role: Pelayan
// ─────────────────────────────────────────────
Route::prefix('pelayanan')->middleware(['auth', 'role:pelayan'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('pelayan.beranda');
    // Tambahkan route fitur pelayan lainnya di sini
    // Route::get('/jadwal',   [PelayanJadwalController::class, 'index'])->name('pelayan.jadwal');
    // Route::get('/absensi',  [PelayanAbsensiController::class, 'index'])->name('pelayan.absensi');
});

// ─────────────────────────────────────────────
// USER / JEMAAT — publik, tanpa login
// ─────────────────────────────────────────────
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/tentang',    [UserTentangController::class, 'index'])->name('user.tentang');
Route::get('/Jadwal',     [UserJadwalController::class, 'index'])->name('user.jadwal');
Route::get('/Galeri',     [UserGaleriController::class, 'index'])->name('user.galeri');
Route::get('/Khotbah',    [UserKhotbahController::class, 'index'])->name('user.khotbah');
Route::get('/kontak',     [UserKontakController::class, 'index'])->name('user.kontak');

// ← Sekarang pakai indexUser(), bukan index()
Route::get('/Pelayanan',  [PelayananController::class, 'indexUser'])->name('user.pelayanan');

Route::get('/Jemaat', function () {
    return view('User.Jemaat.form');
})->name('user.jemaat');

Route::get('/Gereja',    function () { return view('gereja'); })->name('user.gereja');
Route::get('/Ibadah',    function () { return view('ibadah'); })->name('user.ibadah');
Route::get('/cg',        function () { return view('cg'); })->name('user.cg');
Route::get('/terhubung', function () { return view('terhubung'); })->name('user.terhubung');
Route::get('/media',     function () { return view('media'); })->name('user.media');
Route::get('/donate',    function () { return view('donate'); })->name('user.donate');

Route::get('/jadi-jemaat',  [JemaatController::class, 'create'])->name('jemaat.create');
Route::post('/jadi-jemaat', [JemaatController::class, 'store'])->name('jemaat.store');

Route::get('/pengumuman',               [UserPengumumanController::class, 'index'])->name('user.pengumuman');
Route::get('/pengumuman/{pengumuman}',  [UserPengumumanController::class, 'show'])->name('user.pengumuman.show');