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

   
    // membuat data kategori
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
        $kategori = kategori::find($id);
        if (!$kategori) return abort(404, 'Kategori tidak ditemukan');
    
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',
        ]);
    
        $kategori->update($request->only(['nama_kategori', 'deskripsi']));
    
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }
    

    public function edit($id)
    {
    $kategori = kategori::find($id);

    if (!$kategori) {
        abort(404, 'Kategori tidak ditemukan');
    }

    return view('kategori.edit', compact('kategori'));
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

        // Restore kategori
        $kategori->restore();
        return response()->json(['message' => 'Kategori berhasil dikembalikan', 'data' => $kategori]);
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
