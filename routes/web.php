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




/*
|-------------
| ROUTE KATEGORI
|-------------
*/
// Halaman kategori
Route::get('/kategori', function () {return view('kategori.index');})->name('kategori.index');

// Route edit kategori
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

//route create kategori
// Menampilkan form create kategori
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
// Menyimpan kategori baru
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');

// Route untuk halaman trash, restore, force delete, dan soft delete
Route::delete('/kategori/{id_kategori}', [KategoriController::class, 'softDelete'])->name('kategori.softDelete'); //soft delete
Route::get('kategori/trash', [KategoriController::class, 'trashPage'])->name('kategori.trash'); // Menampilkan kategori yang dihapus
Route::post('kategori/restore/{id}', [KategoriController::class, 'restore'])->name('kategori.restore'); // Restore kategori
Route::delete('kategori/force-delete/{id}', [KategoriController::class, 'forceDelete'])->name('kategori.forceDelete'); // Hapus permanen kategori


/*
|-------------
| ROUTE MAKANAN
|-------------
*/
// Halaman recipe/makanan
Route::get('/makanan', function () {return view('makanan.index');})->name('makanan.index');

// Route edit makanan
Route::get('/makanan/{id}/edit', [makananController::class, 'edit'])->name('makanan.edit');
Route::put('/makanan/{id}', [makananController::class, 'update'])->name('makanan.update');

//route create makanan
// Menampilkan form create makanan
Route::get('/makanan/create', [makananController::class, 'create'])->name('makanan.create');
// Menyimpan kategori baru
Route::post('/makanan', [makananController::class, 'store'])->name('makanan.store');

// Route untuk halaman trash, restore, force delete, dan soft delete
Route::delete('/makanan/{id_makanan}', [makananController::class, 'softDelete'])->name('makanan.softDelete'); //soft delete
Route::get('makanan/trash', [makananController::class, 'trashPage'])->name('makanan.trash'); // Menampilkan kategori yang dihapus
Route::post('makanan/restore/{id}', [makananController::class, 'restore'])->name('makanan.restore'); // Restore kategori
Route::delete('makanan/force-delete/{id}', [makananController::class, 'forceDelete'])->name('makanan.forceDelete'); // Hapus permanen kategori