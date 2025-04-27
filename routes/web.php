<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Routing\Route as RoutingRoute;

// Route untuk login
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
// Mengirimkan data login (POST)
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Route untuk logout
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Route untuk mengatur hanya admin yang bisa login
Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard')->middleware(AdminAuth::class);