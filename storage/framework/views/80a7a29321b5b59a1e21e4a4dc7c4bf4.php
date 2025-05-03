<?php $__env->startSection('title', 'Trash - Kategori'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="text-3xl fw-bold mb-4">Trash - Kategori</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <a href="<?php echo e(route('kategori.index')); ?>" class="btn btn-secondary mb-4">Back</a>

        <table class="custom-table">
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
                <?php $__empty_1 = true; $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($item->id_kategori); ?></td>
                        <td><?php echo e($item->nama_kategori); ?></td>
                        <td><?php echo e(Str::limit($item->deskripsi, 50)); ?></td>
                        <td><?php echo e($item->deleted_at->format('d/m/Y')); ?></td>
                        <td>
                            <form action="<?php echo e(route('kategori.restore', $item->id_kategori)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-success btn-sm">Restore</button>
                            </form>
                            <form action="<?php echo e(route('kategori.forceDelete', $item->id_kategori)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini secara permanen?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus Permanen</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada kategori yang dihapus.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\katalogmakanan-PraktikumRPL\katalogmakanan\resources\views/kategori/trash.blade.php ENDPATH**/ ?>