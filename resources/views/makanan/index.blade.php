@extends('layout.app')

@section('title', 'Makanan')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">Makanan</h1>

        <!-- Tombol untuk Create Makanan Baru dan Trash -->
        <div class="mb-4">
            <!-- Tombol Create Makanan -->
            <a href="{{ route('makanan.create') }}" class="btn btn-primary me-3">Create Makanan</a>

            <!-- Tombol menuju halaman trash -->
            <a href="{{ route('makanan.trash') }}" class="btn btn-danger">Lihat Trash</a>
        </div>

        <!-- Tabel Daftar Makanan -->
        <table class="table table-transparent table-hover" id="makanan-table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Makanan</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Resep</th>
                    <th>Cara Masak</th>
                    <th>Gambar</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data makanan akan dimuat di sini menggunakan JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        // Mengambil data makanan dari API
        fetch('http://127.0.0.1:8000/api/makanan')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#makanan-table tbody');
                data.forEach(makanan => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${makanan.id_makanan}</td>
                        <td>${makanan.nama_makanan}</td>
                        <td>${makanan.kategori ? makanan.kategori.nama_kategori : '-'}</td>
                        <td>${makanan.deskripsi.substring(0, 30)}...</td>
                        <td>${makanan.resep.substring(0, 30)}...</td>
                        <td>${makanan.cara_masak.substring(0, 30)}...</td>
                        <td>
                            <img src="/storage/makanan_photos/${makanan.gambar}" width="80" alt="gambar">
                        </td>
                        <td>${new Date(makanan.created_at).toLocaleDateString()}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="/makanan/${makanan.id_makanan}/edit" class="btn btn-warning btn-sm mb-1">Edit</a>

                            <!-- Soft Delete -->
                            <form action="/makanan/${makanan.id_makanan}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus makanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching makanan:', error);
            });
    </script>
@endsection
