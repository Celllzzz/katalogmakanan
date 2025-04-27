<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminAuthController;



// Route untuk login
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Route untuk logout
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Route untuk dashboard admin (nanti kita proteksi pakai middleware)
Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');




