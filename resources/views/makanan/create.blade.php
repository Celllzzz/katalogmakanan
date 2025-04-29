@extends('layout.app')

@section('title', 'Tambah Makanan')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Makanan Baru</h1>

    <form action="{{ route('makanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_makanan" class="form-label">Nama Makanan</label>
            <input type="text" name="nama_makanan" id="nama_makanan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control" required>
                @foreach($kategori as $k)
                    <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="resep" class="form-label">Resep</label>
            <textarea name="resep" id="resep" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="cara_masak" class="form-label">Cara Masak</label>
            <textarea name="cara_masak" id="cara_masak" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg,image/jpeg" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('makanan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
