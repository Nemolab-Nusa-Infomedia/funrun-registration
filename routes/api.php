<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegistrationController;

Route::post('/paymentHandler', [RegistrationController::class, 'paymentHandler'])->name('paymentHandler');

Route::get('/dapatkan/desa/{desaId}', [RegionController::class, 'getDesa']);
