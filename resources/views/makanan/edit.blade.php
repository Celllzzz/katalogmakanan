@extends('layout.app')

@section('title', 'Edit Makanan')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Makanan</h1>

    <form method="POST" action="{{ route('makanan.update', $makanan->id_makanan) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_makanan" class="form-label">Nama Makanan</label>
            <input type="text" class="form-control" id="nama_makanan" name="nama_makanan"
                value="{{ old('nama_makanan', $makanan->nama_makanan) }}">
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control">
                @foreach($kategori as $k)
                    <option value="{{ $k->id_kategori }}" 
                        {{ old('id_kategori', $makanan->id_kategori) == $k->id_kategori ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $makanan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="resep" class="form-label">Resep</label>
            <textarea class="form-control" id="resep" name="resep" rows="4">{{ old('resep', $makanan->resep) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cara_masak" class="form-label">Cara Masak</label>
            <textarea class="form-control" id="cara_masak" name="cara_masak" rows="4">{{ old('cara_masak', $makanan->cara_masak) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            @if($makanan->gambar)
                <img src="{{ asset('storage/makanan_photos/' . $makanan->gambar) }}" width="100" alt="gambar makanan">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('makanan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
