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

        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy me-2" viewBox="0 0 16 16">
                <path d="M11 2H9v3h2z"/>
                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
            </svg>
            Update
        </button>

        <a href="{{ route('makanan.index') }}" class="btn btn-secondary d-inline-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-circle me-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
            Kembali
        </a>
    </form>
</div>
@endsection
