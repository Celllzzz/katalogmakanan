<?php $__env->startSection('title', 'Trash - Makanan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">Trash - Makanan</h1>

        <!-- Pesan sukses atau error -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <a href="<?php echo e(route('makanan.index')); ?>" class="btn btn-secondary mb-4 d-inline-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-circle me-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg>
            Kembali
        </a>


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
                <?php $__empty_1 = true; $__currentLoopData = $makanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($item->id_makanan); ?></td>
                        <td><?php echo e($item->nama_makanan); ?></td>
                        <td><?php echo e($item->kategori->nama_kategori ?? '-'); ?></td>
                        <td><?php echo e($item->deleted_at->format('d/m/Y')); ?></td>
                        <td class="text-center" style="min-width: 160px;">
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Tombol Restore -->
                                <form action="<?php echo e(route('makanan.restore', $item->id_makanan)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success btn-sm d-flex align-items-center justify-content-center px-2" style="min-width: 75px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-counterclockwise me-1" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914a.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/>
                                            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/>
                                        </svg>
                                        Restore
                                    </button>
                                </form>

                                <!-- Tombol Force Delete -->
                                <form action="<?php echo e(route('makanan.forceDelete', $item->id_makanan)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus makanan ini secara permanen?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center px-2" style="min-width: 75px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x me-1" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>


                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada makanan yang dihapus.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\katalogmakanan-PraktikumRPL\katalogmakanan\resources\views/makanan/trash.blade.php ENDPATH**/ ?>