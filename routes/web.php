<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PenggunaController;

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

Route::get('theme-switcher/{activeTheme}', [ThemeController::class, 'switch'])->name('theme-switcher');
Route::get('layout-switcher/{activeLayout}', [LayoutController::class, 'switch'])->name('layout-switcher');

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('proses-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin', 'admin')->name('admin.dashboard');
        Route::get('/pendaftar/{id}',  'getData')->name('pendaftar.data');
        Route::get('/edit-pendaftar/{id}',  'formEdit')->name('edit.data');
    });
    Route::controller(PenggunaController::class)->group(function () {
        Route::get('/profil', 'index')->name('tabel.profil');
        Route::get('/form-tambah-akun', 'tambahAkun')->name('tambah.akun.data');
        Route::get('/form-edit-akun/{id}', 'updateProfil')->name('edit.akun.data');
        Route::post('/save-akun', 'saveAkun')->name('save.akun');
        Route::get('/hapus-akun/{id}', 'hapusAkun')->name('hapus.akun.data');
    });
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/mahasiswa', 'mahasiswa')->name('mahasiswa.dashboard');
        Route::get('/status-daftar', 'statusdaftar')->name('mahasiswa.status');
        Route::get('/form-daftar', 'formdaftar')->name('mahasiswa.form');
    });
    Route::controller(PendaftaranController::class)->group(function () {
        Route::post('/pendaftaran', 'pendaftaran')->name('pendaftaran');
    });
});
Route::get('/get-kabkot/{provinsi_id}', [DashboardController::class, 'getKabKot']);
