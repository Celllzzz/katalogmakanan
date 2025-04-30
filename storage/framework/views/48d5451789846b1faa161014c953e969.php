<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Link ke file CSS terpisah -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #fff;
            border-right: 1px solid #dee2e6;
        }
    </style>
</head>

<body class="bg-light">

    <div class="admin-wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php echo $__env->make('components.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <!-- Main content -->
        <div class="flex-grow-1 d-flex flex-column">
            <!-- Topbar -->
            <?php echo $__env->make('components.topbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Page content -->
            <main class="p-4 flex-grow-1">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

</body>
</html><?php /**PATH D:\Coding\katalogmakanan\resources\views/layout/app.blade.php ENDPATH**/ ?>