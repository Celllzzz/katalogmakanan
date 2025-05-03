<?php $__env->startSection('title', 'Edit Makanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Edit Makanan</h1>

    <form method="POST" action="<?php echo e(route('makanan.update', $makanan->id_makanan)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="nama_makanan" class="form-label">Nama Makanan</label>
            <input type="text" class="form-control" id="nama_makanan" name="nama_makanan"
                value="<?php echo e(old('nama_makanan', $makanan->nama_makanan)); ?>">
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control">
                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($k->id_kategori); ?>" 
                        <?php echo e(old('id_kategori', $makanan->id_kategori) == $k->id_kategori ? 'selected' : ''); ?>>
                        <?php echo e($k->nama_kategori); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?php echo e(old('deskripsi', $makanan->deskripsi)); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="resep" class="form-label">Resep</label>
            <textarea class="form-control" id="resep" name="resep" rows="4"><?php echo e(old('resep', $makanan->resep)); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="cara_masak" class="form-label">Cara Masak</label>
            <textarea class="form-control" id="cara_masak" name="cara_masak" rows="4"><?php echo e(old('cara_masak', $makanan->cara_masak)); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            <?php if($makanan->gambar): ?>
                <img src="<?php echo e(asset('storage/makanan_photos/' . $makanan->gambar)); ?>" width="100" alt="gambar makanan">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo e(route('makanan.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\katalogmakanan-PraktikumRPL\katalogmakanan\resources\views/makanan/edit.blade.php ENDPATH**/ ?>