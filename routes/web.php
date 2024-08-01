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

// ===== Auth Web ===== //
Route::get('/', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/validation-email', [RegistrationController::class, 'emailValidation'])->name('email-validation');
Route::post('/check', [RegistrationController::class, 'checking'])->name('check');
Route::get('/login-admin', [AdminController::class, 'adminLogin'])->name('admin-login');
Route::get('/logout-admin', [AdminController::class, 'adminLogout'])->name('admin-logout');
Route::post('/cek-admin', [AdminController::class, 'adminCek'])->name('cek-admin');
// ===== End Auth Web ===== //


// ===== Akses Superadmin ===== //
Route::middleware(['superAdminAccess'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'indexDashboard'])->name('dashboard');
    // Akun
    Route::get('/akun', [AkunController::class, 'indexAkun'])->name('akun');
    Route::get('/akun-tambah', [AkunController::class, 'tambahAkun'])->name('akun-tambah');
    Route::get('/akun-edit', [AkunController::class, 'editAkun'])->name('akun-edit');
});
// ===== End Akses Superadmin ===== //


// ===== Akses Admin ===== //
Route::middleware(['adminAccess'])->group(function () {
    // Scan
    Route::get('/scan', [RegistrationController::class, 'scan'])->name('scan');
    Route::post('/verify-qr', [AdminController::class, 'verifyQrCode']);
    Route::get('/hasil-scan/{id}', [RegistrationController::class, 'hasilScan'])->name('hasil-scan');
    Route::get('/peserta', [PesertaController::class, 'indexPeserta'])->name('peserta');
});
// ===== End Akses Admin ===== //


// ===== Peserta =====

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'indexProfile'])->name('profile');
    Route::get('/form', [RegistrationController::class, 'indexForm'])->name('form');
    // Logout Peserta
    Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');
    Route::post('/create-account', [RegistrationController::class, 'register'])->name('register');
    Route::post('/paymentHandler', [RegistrationController::class, 'paymentHandler'])->name('paymentHandler');

    // Get Data Region

    // Notification Pembayaran
    Route::get('/pembayaran-berhasil', [RegistrationController::class, 'pembayaranBerhasil'])->name('pembayaran-berhasil');
    Route::get('/pembayaran-gagal', [RegistrationController::class, 'pembayaranGagal'])->name('pembayaran-gagal');
    Route::get('/payment/retry', [RegistrationController::class, 'retryingPayment'])->name('payment.retrying');

});
Route::get('/dapatkan/kabupaten/{provId}', [RegionController::class, 'getKabupaten']);
Route::get('/dapatkan/kecamatan/{kecId}', [RegionController::class, 'getKecamatan']);
Route::get('/dapatkan/desa/{desaId}', [RegionController::class, 'getDesa']);

// ===== Email =====
Route::get('/email/verify', function () {
    return view('admin.auth.verify-email.notification-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
