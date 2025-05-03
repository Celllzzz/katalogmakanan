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

// GET /api/makanan/{id} - menampilkan data makanan berdasarkan ID
Route::get('/makanan/{id}', [MakananController::class, 'show']);

// GET /api/makanan - mencari makanan berdasarkan nama dan kategori
Route::get('makanan/search', [makananController::class, 'search']);

/*
|-------------
| API Katgeori
|-------------
*/

// GET /api/kategori - Menampilkan semua kategori makanan
Route::get('kategori', [kategoriController::class, 'index']);