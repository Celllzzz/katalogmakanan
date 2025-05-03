<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo e(asset('pictures/logo(2).png')); ?>">

    <style>
        body {
            font-family: 'Poppins';
            background-color: #E15A24; /* Warna background orange */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        }
        .logo {
            width: 80px;
            margin-bottom: 1rem;
        }
        .form-control {
            background-color: #f8f9fa;
        }
        .btn-orange {
            background-color: #E15A24;
            color: #fff;
            font-weight: bold;
        }
        .btn-orange:hover {
            background-color: #fff;
            color: #000;
            border: 1px solid #E15A24;
        }
    </style>
</head>
<body>

    <div class="login-card text-center">
        <img src="<?php echo e(asset('pictures/logo(1).png')); ?>" alt="Logo" class="logo mx-auto d-block">
        <h5 class="mt-3 fw-bold">WELCOME BACK, ADMIN!</h5>
        <p class="text-muted mb-4">Enter your credentials to access your account</p>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.login.submit')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required value="<?php echo e(old('email')); ?>">
            </div>

            <div class="mb-4 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-orange w-100">SIGN IN</button>
        </form>
    </div>

</body>
</html>
<?php /**PATH D:\Coding\katalogmakanan-PraktikumRPL\katalogmakanan\resources\views/admin/login.blade.php ENDPATH**/ ?>