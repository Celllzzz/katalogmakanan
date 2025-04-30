<?php $__env->startSection('title', 'Makanan'); ?>

<?php $__env->startSection('content'); ?>
    

    <div class="container">
        <h1 class="text-3xl font-bold mb-4">Makanan</h1>

        <!-- Tombol untuk Create Makanan Baru dan Trash -->
        <div class="mb-4 d-flex gap-2">
            <a href="<?php echo e(route('makanan.create')); ?>" class="btn btn-primary">Create Makanan</a>
            <a href="<?php echo e(route('makanan.trash')); ?>" class="btn btn-danger">Lihat Trash</a>
        </div>

        <!-- Tabel Daftar Makanan -->
        <table class="custom-table" id="makanan-table">
            <thead>
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
                        <td class="text-start-column">${makanan.deskripsi.substring(0, 30)}...</td>
                        <td class="text-start-column">${makanan.resep.substring(0, 30)}...</td>
                        <td class="text-start-column">${makanan.cara_masak.substring(0, 30)}...</td>
                        <td>
                            <img src="/storage/makanan_photos/${makanan.gambar}" width="100" height="100" alt="gambar">
                        </td>
                        <td>${new Date(makanan.created_at).toLocaleDateString()}</td>
                        <td>
                            <a href="/makanan/${makanan.id_makanan}/edit" class="btn btn-warning btn-sm mb-1">Edit</a>
                            <form action="/makanan/${makanan.id_makanan}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus makanan ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\katalogmakanan\resources\views/makanan/index.blade.php ENDPATH**/ ?>