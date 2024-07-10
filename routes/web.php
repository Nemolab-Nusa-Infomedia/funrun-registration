<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('admin.registration.notification-registation-peserta.email.index');
});


// =============== Dashboard ===============

// ===== Beranda =====
Route::get('/dashboard', [DashboardController::class, 'indexDashboard'])->name('dashboard');

// ===== Profile =====
Route::get('/profile', [ProfileController::class, 'indexProfile'])->name('profile');

// ===== Peserta =====
Route::get('/peserta', [PesertaController::class, 'indexPeserta'])->name('peserta');

// ===== Akun =====
Route::get('/akun', [AkunController::class, 'indexAkun'])->name('akun');
Route::get('/akun-tambah', [AkunController::class, 'tambahAkun'])->name('akun-tambah');
Route::get('/akun-edit', [AkunController::class, 'editAkun'])->name('akun-edit');


// =============== Registration ===============

// ===== Form Pendaftaran =====
Route::get('/form', [RegistrationController::class, 'indexForm'])->name('form');

// ===== Notification Pembayaran =====
Route::get('/pembayaran-berhasil', [RegistrationController::class, 'pembayaranBerhasil'])->name('pembayaran-berhasil');
Route::get('/pembayaran-gagal', [RegistrationController::class, 'pembayaranGagal'])->name('pembayaran-gagal');

// ===== Scan =====
Route::get('/scan', [RegistrationController::class, 'scan'])->name('scan');
Route::get('/hasil-scan', [RegistrationController::class, 'hasilScan'])->name('hasil-scan');
