<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// ========== Dashboard ==========
Route::get('/dashboard', [DashboardController::class, 'indexDashboard'])->name('dashboard');

// ========== Profile ==========
Route::get('/profile', [ProfileController::class, 'indexProfile'])->name('profile');

// ========== Peserta ==========
Route::get('/peserta', [PesertaController::class, 'indexPeserta'])->name('peserta');

// ========== Akun ==========
Route::get('/akun', [AkunController::class, 'indexAkun'])->name('akun');
Route::get('/akun-tambah', [AkunController::class, 'tambahAkun'])->name('akun-tambah');
Route::get('/akun-edit', [AkunController::class, 'editAkun'])->name('akun-edit');
