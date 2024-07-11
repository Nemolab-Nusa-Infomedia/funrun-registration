<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/check', [RegistrationController::class, 'checking'])->name('check');
Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');

// =============== Dashboard ===============

// ===== Beranda =====
Route::get('/dashboard', [DashboardController::class, 'indexDashboard'])->name('dashboard');

// ===== Profile =====
Route::get('/profile', [ProfileController::class, 'indexProfile'])->name('profile');
Route::get('/login-admin', [AdminController::class, 'adminLogin'])->name('admin-login');
Route::post('/cek-admin', [AdminController::class, 'adminCek'])->name('cek-admin');


// ===== Peserta =====
Route::get('/peserta', [PesertaController::class, 'indexPeserta'])->name('peserta');

// ===== Akun =====
Route::get('/akun', [AkunController::class, 'indexAkun'])->name('akun');
Route::get('/akun-tambah', [AkunController::class, 'tambahAkun'])->name('akun-tambah');
Route::get('/akun-edit', [AkunController::class, 'editAkun'])->name('akun-edit');


// =============== Registration ===============

// ===== Form Pendaftaran =====
Route::get('/', [RegistrationController::class, 'registrationEmail'])->name('registration-email');
Route::post('/validation-email', [RegistrationController::class, 'emailValidation'])->name('email-validation');
Route::get('/form', [RegistrationController::class, 'indexForm'])->name('form');
Route::post('/create-account', [RegistrationController::class, 'register'])->name('register');
Route::post('/paymentHandler', [RegistrationController::class, 'paymentHandler'])->name('paymentHandler');

// ===== Get data region =====
Route::get('/dapatkan/kabupaten/{provId}', [RegionController::class, 'getKabupaten']);
Route::get('/dapatkan/kecamatan/{kecId}', [RegionController::class, 'getKecamatan']);
Route::get('/dapatkan/desa/{desaId}', [RegionController::class, 'getDesa']);

// ===== Notification Pembayaran =====
Route::get('/pembayaran-berhasil', [RegistrationController::class, 'pembayaranBerhasil'])->name('pembayaran-berhasil');
Route::get('/pembayaran-gagal', [RegistrationController::class, 'pembayaranGagal'])->name('pembayaran-gagal');

// ===== Scan =====
Route::get('/scan', [RegistrationController::class, 'scan'])->name('scan');
Route::post('/verify-qr', [AdminController::class, 'verifyQrCode']);
Route::get('/hasil-scan/{id}', [RegistrationController::class, 'hasilScan'])->name('hasil-scan');

// ===== Email =====
Route::get('/email/verify', function () {
    return view('admin.auth.verify-email.notification-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/form');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
