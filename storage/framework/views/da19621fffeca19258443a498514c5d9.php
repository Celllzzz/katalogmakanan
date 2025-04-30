<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4">Welcome Back, <?php echo e($adminName ?? 'Admin'); ?>!</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Category</h5>
                        <p class="card-text display-6"><?php echo e($totalCategory ?? 0); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Recipe</h5>
                        <p class="card-text display-6"><?php echo e($totalRecipe ?? 0); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Coding\katalogmakanan\resources\views/dashboard.blade.php ENDPATH**/ ?>