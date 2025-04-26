<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\makanan;
use GuzzleHttp\Psr7\Query;

class makananController extends Controller
{
    // menampilkan semua makanan
    public function index()
    {   
        // mengambil semua data makanan beserta kategori yang terkait
        return response()->json(makanan::with('kategori')->get());
    }

   
    // menyimpan data makanan
    public function store(Request $request)
    {   
        // validasi input yang diterima dari request
        $request->validate([
            'nama_makanan' => 'required|string|max:150',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'deskripsi' => 'required|string',
            'resep' => 'required|string',
            'cara_masak' => 'required|string',
            'gambar' => 'required|string'

        ]);

        // membuat data baru
        $makanan = makanan::create([   // perbaiki pemanggilan model makanan
            'nama_makanan' => $request->nama_makanan,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'resep' => $request->resep,
            'cara_masak' => $request->cara_masak,
            'gambar' => $request->gambar
        ]);

        // mengembalikan respon JSON bahwa makanan berhasil ditambahkan
        return response()->json(['message' => 'Makanan berhasil ditambahkan', 'data' => $makanan]);
    }


    // mencari makanan berdasarkan nama dan kategori
    public function search(request $request)
    {
        // validasi input pencarian
        $request->validate([
            'nama_makanan' => 'nullable|string',
            'nama_kategori' => 'nullable|string'
        ]);

        // query awal dengan relasi ke kategori
        $query = makanan::with('kategori');

        // filter berdasarkan nama makanan jika ada
        if ($request->has('nama_makanan')) {
            $query->where('nama_makanan', 'like', '%' . $request->nama_makanan . '%');
        }
        
        // filter berdasarkan nama kategori jika ada
        if ($request->has('nama_kategori')) {
            $query->whereHas('kategori', function ($q) use ($request){
                $q->where('nama_kategori', 'like', '%' . $request->nama_kategori . '%');
            });
        }

        // eksekusi query
        $makanan = $query->get();

        // jika hasil kosong, kirim pesan error
        if ($makanan->isEmpty()) {
            return response()->json(['message' => 'Makanan tidak ditemukan'], 404);
        }

        return response()->json($makanan);
    }


    // meng update data makanan
    public function update(Request $request, string $id)
    {
        // mencari makanan berdasarkan id
        $makanan = makanan::find($id);
        if (!$makanan) return response()->json(['messgage' => 'Makanan tidak ditemukan'],404);

        // validasi input
        $request->validate([
            'nama_makanan' => 'string|max:150',
            'id_kategori' => 'exists:kategori,id_kategori',
            'resep' => 'string',
            'deskripsi' => 'string',
            'cara masak' => 'string',
            'gambar' => 'string'
        ]);

        // update data makanan
        $makanan->update($request->all());

        return response()->json(['message' => 'Makanan berhasil diperbarui', 'data' => $makanan]);
    }


    // soft delete
    public function trash()
    {
        return response()->json(makanan::onlyTrashed()->get());
    }

    public function showTrash()
    {
    // Mengambil semua makanan yang telah dihapus (soft delete)
    $makanan = Makanan::onlyTrashed()->with('kategori')->get();

    // Jika tidak ada makanan yang dihapus, kembalikan pesan error
    if ($makanan->isEmpty()) {
        return response()->json(['message' => 'Tidak ada makanan di trash'], 404);
    }

    return response()->json($makanan);
    }


    // mengembalikan makanan yang sudah dihapus
    public function restore($id) 
    {
        $makanan = makanan::onlyTrashed()->where('id_makanan', $id)->first();
        if (!$makanan) return response()->json(['message' => ',Makanan tidak ditemukan di trash'], 404); 
    }


    // menghapus makanan secara permanen
    public function forceDelete($id) 
    {
        $makanan = makanan::onlyTrashed()->where('id_makanan', $id)->first();
        if (!$makanan) return response()->json(['message' => 'Makanan tidak ditemukan di trash'], 404);

        $makanan->forceDelete();
        return response()->json(['message' => 'Makanan dihapus permanen']);
        
    }

}