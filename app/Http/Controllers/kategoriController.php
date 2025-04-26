<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;

class kategoriController extends Controller
{
    // menampilkan semua kategori
    public function index()
    {   
        // mengambil semua data kategori
        return response()->json(kategori::all());
    }

   
    // menyimpan data kategori
    public function store(Request $request)
    {   
        // validasi input yang diterima dari request
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',

        ]);

        // membuat kategori baru
        $kategori = Kategori::create([   // perbaiki pemanggilan model Kategori
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        // mengembalikan respon JSON bahwa kategori berhasil ditambahkan
        return response()->json(['message' => 'Kategori berhasil ditambahkan', 'data' => $kategori]);
    }


    // mencari makanan berdasarkan nama dan kategori
   

    // meng update data makanan
    public function update(Request $request, string $id)
    {
        // mencari kategori berdasarkan id
        $kategori = kategori::find($id);
        if (!$kategori) return response()->json(['messgage' => 'Kategori tidak ditemukan'],404);

        // validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',
        ]);

        // update data makanan
        $kategori->update($request->all());

        return response()->json(['message' => 'Kategori berhasil diperbarui', 'data' => $kategori]);
    }

    
    // soft delete
    public function trash()
    {
        return response()->json(kategori::onlyTrashed()->get());
    }

    public function showTrash()
    {
    // Mengambil semua kategori yang telah dihapus (soft delete)
    $kategori = Kategori::onlyTrashed()->get();

    // Jika tidak ada kategori yang dihapus, kembalikan pesan error
    if ($kategori->isEmpty()) {
        return response()->json(['message' => 'Tidak ada kategori di trash'], 404);
    }

    return response()->json($kategori);
    }


    // mengembalikan kategori yang sudah dihapus
    public function restore($id) 
    {
        $kategori = kategori::onlyTrashed()->where('id_kategori', $id)->first();
        if (!$kategori) return response()->json(['message' => 'Kategori tidak ditemukan di trash'], 404); 
    }


    // menghpuas makanan secara permanen
    public function forceDelete($id) 
    {
        $kategori = kategori::onlyTrashed()->where('id_kategori', $id)->first();
        if (!$kategori) return response()->json(['message' => ',Kategori tidak ditemukan di trash'], 404);

        $kategori->forceDelete();
        return response()->json(['message' => 'Kategori dihapus permanen']);
        
    }
}
