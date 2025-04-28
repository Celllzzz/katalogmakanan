<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\makananController;
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

// Halaman recipe/makanan
Route::get('/makanan', function () {return view('makanan.index');})->name('makanan.index');


//  ROUTE KATEGORI //
// Halaman kategori
Route::get('/kategori', function () {return view('kategori.index');})->name('kategori.index');

// routes trash kategories
Route::get('/kategori/trash', [kategoriController::class, 'trash'])->name('kategori.trash');

// Route untuk menampilkan form create kategori
Route::get('/kategori/create', [kategoriController::class, 'create'])->name('kategori.create');

// Route untuk menyimpan kategori baru
Route::post('/kategori', [kategoriController::class, 'store'])->name('kategori.store');

// Route edit kategori
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

//route create kategori
// Menampilkan form create kategori
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
// Menyimpan kategori baru
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');

// Route untuk halaman trash, restore, force delete, dan soft delete
Route::delete('/kategori/{id_kategori}', [KategoriController::class, 'softDelete'])->name('kategori.softDelete');
Route::get('kategori/trash', [KategoriController::class, 'trashPage'])->name('kategori.trash'); // Menampilkan kategori yang dihapus
Route::post('kategori/restore/{id}', [KategoriController::class, 'restore'])->name('kategori.restore'); // Restore kategori
Route::delete('kategori/force-delete/{id}', [KategoriController::class, 'forceDelete'])->name('kategori.forceDelete'); // Hapus permanen kategori