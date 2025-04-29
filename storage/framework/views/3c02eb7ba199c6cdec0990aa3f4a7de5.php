

<?php $__env->startSection('title', 'Tambah Makanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Tambah Makanan Baru</h1>

    <form action="<?php echo e(route('makanan.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="nama_makanan" class="form-label">Nama Makanan</label>
            <input type="text" name="nama_makanan" id="nama_makanan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control" required>
                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($k->id_kategori); ?>"><?php echo e($k->nama_kategori); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="resep" class="form-label">Resep</label>
            <textarea name="resep" id="resep" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="cara_masak" class="form-label">Cara Masak</label>
            <textarea name="cara_masak" id="cara_masak" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg,image/jpeg" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo e(route('makanan.index')); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\katalogmakanan\resources\views/makanan/create.blade.php ENDPATH**/ ?>