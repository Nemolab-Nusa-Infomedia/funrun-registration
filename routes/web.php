<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// ========== Profile ==========
Route::get('/profile', [ProfileController::class, 'indexProfile'])->name('profile');


// ========== Peserta ==========
Route::get('/profile', [ProfileController::class, 'indexProfile'])->name('profile');
