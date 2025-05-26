<?php $__env->startSection('title', 'Kategori'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Link ke file CSS terpisah -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <div class="container">
        <div class=" sticky-top py-3 bg-light " style="top: 0 px; z-index: 1020; border-bottom: 2px solid #e5e5e5;">
            <h1 class="text-3xl fw-bold mb-3">Kategori</h1>

            <!-- Tombol untuk Create Kategori Baru dan Trash -->
            <div class="mb-2 d-flex gap-2">
                <a href="<?php echo e(route('kategori.create')); ?>" class="btn btn-primary">
                    <!-- Ikon untuk Create Kategori -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square me-2" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                    Tambah Kategori
                </a>
                <a href="<?php echo e(route('kategori.trash')); ?>" class="btn btn-danger">
                    <!-- Ikon untuk Trash -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3 me-2" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                    </svg>
                    Lihat Sampah
                </a>
            </div>

        
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
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Tombol Edit -->
                                <a href="/kategori/${category.id_kategori}/edit"
                                class="btn btn-warning btn-sm d-flex align-items-center justify-content-center"
                                style="width: 80px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square me-2" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 
                                            .706L14.459 3.69l-2-2L13.502.646a.5.5 0 
                                            0 1 .707 0l1.293 1.293zm-1.75 
                                            2.456-2-2L4.939 9.21a.5.5 0 0 
                                            0-.121.196l-.805 2.414a.25.25 0 0 
                                            0 .316.316l2.414-.805a.5.5 0 0 0 
                                            .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 
                                            0 2.5 15h11a1.5 1.5 0 0 0 
                                            1.5-1.5v-6a.5.5 0 0 0-1 
                                            0v6a.5.5 0 0 1-.5.5h-11a.5.5 
                                            0 0 1-.5-.5v-11a.5.5 0 0 
                                            1 .5-.5H9a.5.5 0 0 0 
                                            0-1H2.5A1.5 1.5 0 0 0 
                                            1 2.5z"/>
                                    </svg>
                                    Ubah
                                </a>

                                <!-- Tombol Delete -->
                                <form action="/kategori/${category.id_kategori}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                                        style="width: 80px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-x-square me-2 fs-5" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 
                                            1 1v12a1 1 0 0 1-1 
                                            1H2a1 1 0 0 1-1-1V2a1 
                                            1 0 0 1 1-1zM2 0a2 2 0 
                                            0 0-2 2v12a2 2 0 0 0 2 
                                            2h12a2 2 0 0 0 2-2V2a2 
                                            2 0 0 0-2-2z"/>
                                        <path d="M4.646 4.646a.5.5 0 
                                            0 1 .708 0L8 7.293l2.646-2.647a.5.5 
                                            0 0 1 .708.708L8.707 8l2.647 
                                            2.646a.5.5 0 0 1-.708.708L8 
                                            8.707l-2.646 2.647a.5.5 0 0 
                                            1-.708-.708L7.293 8 4.646 
                                            5.354a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                    Hapus
                                </button>

                                </form>
                            </div>
                        </td>


                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching categories:', error);
            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\katalogmakanan-PraktikumRPL\katalogmakanan\resources\views/kategori/index.blade.php ENDPATH**/ ?>