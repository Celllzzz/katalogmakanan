@extends('layout.app')

@section('title', 'Trash - Category')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">Trash - Kategori</h1>

        <!-- Pesan sukses atau error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary mb-4">Back</a>

        <!-- Tabel kategori yang dihapus -->
        <table class="table table-bordered table-transparent">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Dihapus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $item)
                    <tr>
                        <td>{{ $item->id_kategori }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                        <td>{{ $item->deleted_at->format('d/m/Y') }}</td>
                        <td>
                            <!-- Tombol Restore -->
                            <form action="{{ route('kategori.restore', $item->id_kategori) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Restore</button>
                            </form>

                            <!-- Tombol Force Delete -->
                            <form action="{{ route('kategori.forceDelete', $item->id_kategori) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini secara permanen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus Permanen</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada kategori yang dihapus.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
