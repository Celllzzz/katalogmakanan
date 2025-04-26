<?php

use App\Http\Controllers\makananController;
use App\Http\Controllers\kategoriController;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
|-------------
| API MAKANAN
|-------------
*/

// GET /api/makanan - menampilkan semua data makanan
Route::get('makanan', [makananController::class, 'index']);

// POST /api/makanan - menambahkan data makanan baru ke database
Route::post('makanan', [makananController::class, 'store']);

// GET /api/makanan - mencari makanan berdasarkan nama dan kategori
Route::get('makanan/search', [makananController::class, 'search']);

// PUT /api/makanan/{id} - Mengupdate data makanan berdasarkan ID
Route::put('makanan/{id}', [makananController::class, 'update']);

// DELETE /api/makanan/trash/{id} - Menghapus makanan dengan soft delete
Route::delete('makanan/trash/{id}', [makananController::class, 'trash']);

// GET /api/makanan/trash - Menampilkan semua makanan yang telah dihapus (soft delete)
Route::get('makanan/trash', [makananController::class, 'showTrash']);

// POST /api/makanan/restore/{id} - Mengembalikan makanan yang telah dihapus (soft delete)
Route::post('makanan/restore/{id}', [makananController::class, 'restore']);

// DELETE /api/makanan/force-delete/{id} - Menghapus makanan secara permanen dari database
Route::delete('makanan/force-delete/{id}', [makananController::class, 'forceDelete']);

/*
|-------------
| API Katgeori
|-------------
*/

// GET /api/kategori - Menampilkan semua kategori makanan
Route::get('kategori', [kategoriController::class, 'index']);

// POST /api/kategori - Menambahkan kategori baru ke database
Route::post('kategori', [kategoriController::class, 'store']);

// PUT /api/kategori/{id} - Mengupdate data kategori berdasarkan ID
Route::put('kategori/{id}', [kategoriController::class, 'update']);

// DELETE /api/kategori/trash/{id} - Menghapus makanan dengan soft delete
Route::delete('kategori/trash/{id}', [kategoriController::class, 'trash']);

// GET /api/kategori/trash - Menampilkan semua makanan yang telah dihapus (soft delete)
Route::get('kategori/trash', [kategoriController::class, 'showTrash']);

// POST /api/kategori/restore/{id} - Mengembalikan makanan yang telah dihapus (soft delete)
Route::post('kategori/restore/{id}', [kategoriController::class, 'restore']);

// DELETE /api/kategori/force-delete/{id} - Menghapus makanan secara permanen dari database
Route::delete('kategori/force-delete/{id}', [kategoriController::class, 'forceDelete']);

