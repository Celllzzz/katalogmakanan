@extends('layout.app')

@section('title', 'Trash - Makanan')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">Trash - Makanan</h1>

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

        <a href="{{ route('makanan.index') }}" class="btn btn-secondary mb-4">Kembali</a>

        <!-- Tabel makanan yang dihapus -->
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Makanan</th>
                    <th>Kategori</th>
                    <th>Tanggal Dihapus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($makanan as $item)
                    <tr>
                        <td>{{ $item->id_makanan }}</td>
                        <td>{{ $item->nama_makanan }}</td>
                        <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $item->deleted_at->format('d/m/Y') }}</td>
                        <td>
                            <!-- Tombol Restore -->
                            <form action="{{ route('makanan.restore', $item->id_makanan) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Restore</button>
                            </form>

                            <!-- Tombol Force Delete -->
                            <form action="{{ route('makanan.forceDelete', $item->id_makanan) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus makanan ini secara permanen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus Permanen</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada makanan yang dihapus.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
