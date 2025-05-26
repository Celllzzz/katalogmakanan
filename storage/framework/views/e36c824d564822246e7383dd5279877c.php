<div class="bg-white border-end vh-100 d-flex flex-column p-4 sticky-top" style="width: 250px;">
    <div class="d-flex align-items-center mb-4 mt-2">
        <img src="<?php echo e(asset('pictures/logo(1).png')); ?>" alt="Logo" style="height: 70px;" class="me-3">
        <span class="fw-bold fs-5" style="color: #E15A24; margin-left: 8px">Admin<br>Panel</span>
    </div>

    <ul class="nav flex-column gap-2">
        <!-- Nama Admin -->
        <li class="nav-item">
            <div class="nav-link sidebar-link d-flex align-items-center" style="pointer-events: none;">
                <span class="icon me-2" style="color: #E15A24;"> 
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 18px; height: 18px;">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/>
                    </svg>
                </span>
                <span class="nav-text" style="color: #E15A24;"><?php echo e($adminName ?? 'Admin'); ?></span> 
            </div>
        </li>

        <!-- Menu Home -->
        <li class="nav-item">
            <a href="<?php echo e(route('admin.dashboard')); ?>" 
               class="nav-link sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 18px; height: 18px;">
                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                    </svg>
                </span>
                <span class="nav-text">Home</span>
            </a>
        </li>

        <!-- Menu Kategori -->
        <li class="nav-item">
            <a href="<?php echo e(route('kategori.index')); ?>" 
               class="nav-link sidebar-link <?php echo e(request()->routeIs('kategori.*') ? 'active' : ''); ?>">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 18px; height: 18px;">
                        <path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/>
                    </svg>
                </span>
                <span class="nav-text">Kategori</span>
            </a>
        </li>

        <!-- Menu Makanan -->
        <li class="nav-item">
            <a href="<?php echo e(route('makanan.index')); ?>" 
               class="nav-link sidebar-link <?php echo e(request()->routeIs('makanan.*') ? 'active' : ''); ?>">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 18px; height: 18px;">
                        <path d="M0 192c0-35.3 28.7-64 64-64c.5 0 1.1 0 1.6 0C73 91.5 105.3 64 144 64c15 0 29 4.1 40.9 11.2C198.2 49.6 225.1 32 256 32s57.8 17.6 71.1 43.2C339 68.1 353 64 368 64c38.7 0 71 27.5 78.4 64c.5 0 1.1 0 1.6 0c35.3 0 64 28.7 64 64c0 11.7-3.1 22.6-8.6 32L8.6 224C3.1 214.6 0 203.7 0 192zm0 91.4C0 268.3 12.3 256 27.4 256l457.1 0c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28l-231.5 0c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4z"/>
                    </svg>
                </span>
                <span class="nav-text">Makanan</span>
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item mt-3">
            <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                    <span class="icon me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 18px; height: 18px;">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                        </svg>
                    </span>
                    Keluar
                </button>
            </form>
        </li>
    </ul>
</div>

<style>
    .sidebar-link {
        color: #000;
        padding: 10px 15px;
        border-radius: 8px;
        transition: 0.3s;
        display: flex;
        align-items: center;
    }

    .sidebar-link .icon {
        color: inherit;
        margin-right: 10px; /* Memberikan jarak antara ikon dan teks */
    }

    .sidebar-link .nav-text {
        margin-left: 25px;
        text-align: left;
    }

    .sidebar-link:hover {
        background-color: #E15A24;
        color: #fff;
    }

    .sidebar-link.active {
        background-color: #E15A24;
        color: #fff;
    }

    .sidebar-link svg {
        fill: currentColor;
    }

    .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }

    .btn-outline-danger .icon svg {
        fill: #dc3545;
    }

    .btn-outline-danger:hover .icon svg {
        fill: white;
    }

</style><?php /**PATH D:\Coding\katalogmakanan-PraktikumRPL\katalogmakanan\resources\views/components/sidebar.blade.php ENDPATH**/ ?>