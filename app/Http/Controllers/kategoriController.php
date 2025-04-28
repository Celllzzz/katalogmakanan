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

   
    public function create()
    {
        return view('kategori.create');
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

        // mengembalikan respon
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
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

    // Soft delete kategori
    public function softDelete($id)
    {
        $kategori = kategori::find($id);

        if (!$kategori) {
        return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan');
        }

        // Soft delete kategori
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dipindahkan ke trash');
    }
    
    // Menampilkan kategori yang sudah di soft delete
    public function trashPage()
    {
        // Mengambil semua kategori yang telah dihapus (soft delete)
        $kategori = kategori::onlyTrashed()->get();
        return view('kategori.trash', compact('kategori'));
    }

    // Mengembalikan kategori yang sudah dihapus
    public function restore($id)
    {
        $kategori = kategori::onlyTrashed()->where('id_kategori', $id)->first();
        if (!$kategori) {
            return redirect()->route('kategori.trash')->with('error', 'Kategori tidak ditemukan di trash');
        }

        // Restore kategori
        $kategori->restore();
        return redirect()->route('kategori.trash')->with('success', 'Kategori berhasil dikembalikan');
    }

    // Menghapus kategori secara permanen
    public function forceDelete($id)
    {
        $kategori = kategori::onlyTrashed()->where('id_kategori', $id)->first();
        if (!$kategori) {
            return redirect()->route('kategori.trash')->with('error', 'Kategori tidak ditemukan di trash');
        }

        $kategori->forceDelete();
        return redirect()->route('kategori.trash')->with('success', 'Kategori dihapus permanen');
    }
}
