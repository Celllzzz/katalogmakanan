

<?php $__env->startSection('title', 'Edit Kategori'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Edit Kategori</h1>

    <form method="POST" action="<?php echo e(route('kategori.update', $kategori->id_kategori)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                value="<?php echo e(old('nama_kategori', $kategori->nama_kategori)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?php echo e(old('deskripsi', $kategori->deskripsi)); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo e(route('kategori.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Program Files Juga\xampp\htdocs\katalogmakanan\resources\views/kategori/edit.blade.php ENDPATH**/ ?>