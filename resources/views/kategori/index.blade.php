@extends('layout.app')

@section('title', 'Kategori')

@section('content')
    <!-- Link ke file CSS terpisah -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <div class="container">
        <h1 class="text-3xl fw-bold mb-4">Kategori</h1>

        <!-- Tombol untuk Create Kategori Baru dan Trash -->
        <div class="mb-4 d-flex gap-2">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">Create Kategori</a>
            <a href="{{ route('kategori.trash') }}" class="btn btn-danger">Lihat Trash</a>
        </div>

        <!-- Tabel Daftar Kategori -->
        <table class="custom-table" id="categories-table">
            <thead>
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
        fetch('http://127.0.0.1:8000/api/kategori')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#categories-table tbody');
                data.forEach(category => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${category.id_kategori}</td>
                        <td>${category.nama_kategori}</td>
                        <td class="text-start-column">${category.deskripsi.substring(0, 50)}...</td>
                        <td>${new Date(category.created_at).toLocaleDateString()}</td>
                        <td>
                            <a href="/kategori/${category.id_kategori}/edit" class="btn btn-warning btn-sm">Edit</a>
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
