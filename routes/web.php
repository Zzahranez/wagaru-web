<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminIuranController;
use App\Http\Controllers\AdminKelolaUser;
use App\Http\Controllers\AdminPengajuanSurat;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ViewAdminIuran;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\HanyaUserMiddleware;
use App\Http\Middleware\RoleMidlleware;
use App\Http\Middleware\SessionTimeoutMiddleware;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;


// Beranda
Route::get('/', [BerandaController::class, 'index'])->name('beranda')->middleware(HanyaUserMiddleware::class, SessionTimeoutMiddleware
::class);



Route::get('admindash', [AdminDashboardController::class, 'index'])->name('admindash');

Route::get('/login', [LoginController::class, 'TampilForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/download/{id}', [RiwayatController::class, 'download'])->name('download');

Route::middleware(AdminMiddleware::class, SessionTimeoutMiddleware::class)->group(function () {
    Route::resource('adminkelolauser', AdminKelolaUser::class);
    Route::resource('adminkelolapengguna', DataPenggunaController::class);
    Route::resource('adminkelolaiuran', AdminIuranController::class);
    Route::resource('adminpengajuansurat', AdminPengajuanSurat::class);
    Route::resource('viewadminiuran', ViewAdminIuran::class);
});

Route::middleware(RoleMidlleware::class, SessionTimeoutMiddleware::class)->group(function () {
    Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::resource('iuran', IuranController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('pengajuan', PengajuanController::class);
});
