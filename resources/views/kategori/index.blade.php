@extends('layout.app')

@section('title', 'Category')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">Category</h1>

        <!-- Tombol untuk Create Kategori Baru dan Trash -->
        <div class="mb-4">
            <!-- Tombol Create Category -->
            <a href="{{ route('kategori.create') }}" class="btn btn-primary me-3">Create Category</a>

            <!-- Tombol menuju halaman trash -->
            <a href="{{ route('kategori.trash') }}" class="btn btn-danger">Lihat Trash</a>
        </div>

        <!-- Tabel Daftar Kategori -->
        <table class="table table-transparent table-hover" id="categories-table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data kategori akan dimuat di sini menggunakan JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        // Mengambil data kategori dari API
        fetch('http://127.0.0.1:8000/api/kategori') // URL API yang mengembalikan daftar kategori
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#categories-table tbody');
                data.forEach(category => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${category.id_kategori}</td>
                        <td>${category.nama_kategori}</td>
                        <td>${category.deskripsi.substring(0, 50)}...</td> <!-- Batasi deskripsi -->
                        <td>${new Date(category.created_at).toLocaleDateString()}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="/kategori/${category.id_kategori}/edit" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Soft Delete -->
                            <form action="/kategori/${category.id_kategori}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                console.error('Error fetching categories:', error);
            });
    </script>

    
@endsection
