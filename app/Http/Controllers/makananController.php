<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\makanan;
use App\Models\kategori;


class makananController extends Controller
{
    // menampilkan semua makanan
    public function index()
    {
        // mengambil semua data makanan beserta kategori yang terkait
        $makanan = makanan::with('kategori')->get();

        // mengembalikan response JSON dengan data makanan
        return response()->json($makanan);
    }

    // menampilkan data berdasarkan ID
    public function show($id)
    {
        $makanan = Makanan::with('kategori')->find($id);

        if (!$makanan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($makanan);
    }


    public function create()
    {   
        $kategori = kategori::all();
        return view('makanan.create', compact('kategori'));
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
            'gambar' => 'required|image|mimes:jpg,jpeg|max:2048'

        ]);

        // Upload file
        $file = $request->file('gambar');
        $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('makanan_photos', $namaFile, 'public');

        // membuat data baru
        $makanan = makanan::create([   // perbaiki pemanggilan model makanan
            'nama_makanan' => $request->nama_makanan,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'resep' => $request->resep,
            'cara_masak' => $request->cara_masak,
            'gambar' => $namaFile,
        ]);

        // mengembalikan respon 
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan');
    
    }


    //search
    public function search(Request $request): JsonResponse
    {
        $query = $request->input('search');
        
        if (empty($query)) {
            return response()->json(['message' => 'Search query is required'], 422);
        }
        
        $makananResults = makanan::search($query)->raw();
        $kategoriResults = Kategori::search($query)->get();
        
        return response()->json([
            'makanan' => $makananResults,
            'kategori' => $kategoriResults,
        ]);
    }

    public function edit($id)
    {
        $makanan = makanan::find($id);

        if (!$makanan) {
        abort(404, 'Makanan tidak ditemukan');
        }

        // Ambil semua kategori
        $kategori = kategori::all();

        return view('makanan.edit', compact('makanan', 'kategori'));
    }


    public function update(Request $request, string $id)
    {
        // cari data makanan berdasarkan ID
        $makanan = makanan::find($id);
         if (!$makanan) {
            return abort(404, 'Makanan tidak ditemukan');
        }

        // validasi data
        $request->validate([
            'nama_makanan' => 'nullable|string|max:150',
            'id_kategori' => 'nullable|exists:kategori,id_kategori',
            'resep' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'cara_masak' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg|max:2048',
        ]);

        // jika ada file gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            // hapus gambar lama jika ada
            if ($makanan->gambar && Storage::disk('public')->exists('makanan_photos/' . $makanan->gambar)) {
                Storage::disk('public')->delete('makanan_photos/' . $makanan->gambar);
            }

            // upload gambar baru
            $file = $request->file('gambar');
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('makanan_photos', $namaFile, 'public');
            $makanan->gambar = $namaFile;
        }

        // update field lainnya
        $makanan->update([
            'nama_makanan' => $request->nama_makanan,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'resep' => $request->resep,
            'cara_masak' => $request->cara_masak,
            'gambar' => $makanan->gambar, // tetap pakai gambar lama jika tidak ada update
        ]);

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui.');
    }

    // Soft delete kategori
    public function softDelete($id)
    {
        $makanan = makanan::find($id);

        if (!$makanan) {
        return redirect()->route('makanan.index')->with('error', 'Makanan tidak ditemukan');
        }

        // Soft delete kategori
        $makanan->delete();
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dipindahkan ke trash');
    }
    
    // Menampilkan kategori yang sudah di soft delete
    public function trashPage()
    {
        // Mengambil semua kategori yang telah dihapus (soft delete)
        $makanan = makanan::onlyTrashed()->get();
        return view('makanan.trash', compact('makanan'));
    }

    // Mengembalikan makanan yang sudah dihapus
    public function restore($id)
    {
        $makanan = makanan::onlyTrashed()->where('id_makanan', $id)->first();
        if (!$makanan) {
            return redirect()->route('makanan.trash')->with('error', 'Makanan tidak ditemukan di trash');
        }

        // Restore kategori
        $makanan->restore();
        return redirect()->route('makanan.trash')->with('success', 'Makanan berhasil dikembalikan');
    }

    // Menghapus kategori secara permanen
    public function forceDelete($id)
    {
        $makanan = makanan::onlyTrashed()->where('id_makanan', $id)->first();
        if (!$makanan) {
            return redirect()->route('makanan.trash')->with('error', 'Makanan tidak ditemukan di trash');
        }

        // Hapus gambar jika ada
        if ($makanan->gambar && Storage::disk('public')->exists('makanan_photos/' . $makanan->gambar)) {
        Storage::disk('public')->delete('makanan_photos/' . $makanan->gambar);
        }

        $makanan->forceDelete();
        return redirect()->route('makanan.trash')->with('success', 'Makanan dihapus permanen');
    }

}