<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MakananController;
use App\Http\Middleware\AdminAuth;

// Route login & logout (tanpa middleware)
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Semua route berikut butuh login (middleware AdminAuth)
Route::middleware([AdminAuth::class])->group(function () {

    Route::get('/', function () {
        return redirect('/dashboard');
    });

    // Dashboard
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    /*
    |-------------
    | ROUTE KATEGORI
    |-------------
    */
    Route::get('/kategori', function () {
        return view('kategori.index');
    })->name('kategori.index');

    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id_kategori}', [KategoriController::class, 'softDelete'])->name('kategori.softDelete');
    Route::get('/kategori/trash', [KategoriController::class, 'trashPage'])->name('kategori.trash');
    Route::post('/kategori/restore/{id}', [KategoriController::class, 'restore'])->name('kategori.restore');
    Route::delete('/kategori/force-delete/{id}', [KategoriController::class, 'forceDelete'])->name('kategori.forceDelete');

    /*
    |-------------
    | ROUTE MAKANAN
    |-------------
    */
    Route::get('/makanan', function () {
        return view('makanan.index');
    })->name('makanan.index');

    Route::get('/makanan/create', [MakananController::class, 'create'])->name('makanan.create');
    Route::post('/makanan', [MakananController::class, 'store'])->name('makanan.store');
    Route::get('/makanan/{id}/edit', [MakananController::class, 'edit'])->name('makanan.edit');
    Route::put('/makanan/{id}', [MakananController::class, 'update'])->name('makanan.update');
    Route::delete('/makanan/{id_makanan}', [MakananController::class, 'softDelete'])->name('makanan.softDelete');
    Route::get('/makanan/trash', [MakananController::class, 'trashPage'])->name('makanan.trash');
    Route::post('/makanan/restore/{id}', [MakananController::class, 'restore'])->name('makanan.restore');
    Route::delete('/makanan/force-delete/{id}', [MakananController::class, 'forceDelete'])->name('makanan.forceDelete');
});
