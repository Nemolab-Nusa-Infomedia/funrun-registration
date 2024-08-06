<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UndianController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// ===== Auth Web ===== //
Route::get('/', function () {
    return view('admin.auth.registration');
})->name('registration');
Route::post('/validation-email', [RegistrationController::class, 'emailValidation'])->name('email-validation');
Route::get('/login', [RegistrationController::class, 'login'])->name('login');
Route::post('/check', [RegistrationController::class, 'checking'])->name('check');
Route::get('/reset-password', [RegistrationController::class, 'resetPassword'])->name('reset-password');
Route::get('/gagal-login', [RegistrationController::class, 'gagalLogin'])->name('gagal-login');
Route::get('/login-admin', [AdminController::class, 'adminLogin'])->name('admin-login');
Route::post('/cek-admin', [AdminController::class, 'adminCek'])->name('cek-admin');
Route::get('/logout-admin', [AdminController::class, 'adminLogout'])->name('admin-logout');
Route::post('/cek-admin', [AdminController::class, 'adminCek'])->name('cek-admin');
Route::get('/reset-password', [AdminController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password', [AdminController::class, 'checkephone'])->name('check-ephone');
Route::get('/reset-password-nd', [AdminController::class, 'resetPasswordnd'])->name('reset-password-nd');
Route::post('/reset-password-nd', [AdminController::class, 'updatePasswordnd'])->name('update-password');
// ===== End Auth Web ===== //
Route::get('/get-user', [AdminController::class, 'getusers'])->name('getusers');


// ===== Akses Admin ===== //
Route::middleware(['adminAccess'])->group(function () {
    // Scan
    Route::get('/scan', [RegistrationController::class, 'scan'])->name('scan');
    Route::post('/verify-qr', [AdminController::class, 'verifyQrCode']);
    Route::get('/hasil-scan/{id}', [RegistrationController::class, 'hasilScan'])->name('hasil-scan');
    Route::get('/peserta', [PesertaController::class, 'indexPeserta'])->name('peserta');

    Route::get('/undian-doorprize', [UndianController::class, 'index'])->name('undian-doorprize');
    Route::post('/undian-doorprize', [UndianController::class, 'PemenangUndian'])->name('mulai-undi');
    Route::post('/undian-doorprize-hangus', [UndianController::class, 'HangusUndian'])->name('hangus-undi');
});
// ===== End Akses Admin ===== //


// ===== Peserta =====

Route::middleware(['authall'])->group(function () {
    Route::get('/form', [RegistrationController::class, 'indexForm'])->name('form');
    Route::get('/profile', [ProfileController::class, 'indexProfile'])->name('profile');
    // Logout Peserta
    Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');
    Route::post('/create-account', [RegistrationController::class, 'register'])->name('register');
    Route::post('/paymentHandler', [RegistrationController::class, 'paymentHandler'])->name('paymentHandler');

    // Notification Pembayaran
    Route::get('/pembayaran-berhasil', [RegistrationController::class, 'pembayaranBerhasil'])->name('pembayaran-berhasil');
    Route::get('/pembayaran-gagal', [RegistrationController::class, 'pembayaranGagal'])->name('pembayaran-gagal');
    Route::get('/payment/retry', [RegistrationController::class, 'retryingPayment'])->name('payment.retrying');

    Route::get('/preview-certificate/{name}', [CertificateController::class, 'previewCertificate'])->name('preview-certificate');
    Route::get('/certificate', [CertificateController::class, 'certificate'])->name('certificate');
    Route::get('/certificate/{name}', [CertificateController::class, 'generate'])->name('generate-certificate');
});

// ===== Email =====
Route::get('/success-verify-email', function () {
    return view('admin.auth.notification-verify-email.success-verify');
})->name('success-verify-email');

Route::get('/failed-verify-email', function () {
    return view('admin.auth.notification-verify-email.failed-verify');
})->name('failed-verify-email');

Route::get('/email/verify', function () {
    return view('admin.auth.verify-email.notification-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    $user = $request->user();
    $nowInJakarta = Carbon::now('Asia/Jakarta');
    $user->email_verified_at = $nowInJakarta->toDateTimeString();
    $user->save();
    return redirect()->route('success-verify-email');
})->middleware(['auth', 'signed', 'checkVerifyLinkExpired'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return redirect()->route('verification.notice');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
