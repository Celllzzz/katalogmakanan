@extends('layout.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Kategori</h1>

    <form method="POST" action="{{ route('kategori.update', $kategori->id_kategori) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
