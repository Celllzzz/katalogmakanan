<div class="bg-white border-end vh-100 p-3" style="width: 250px;">

    <div class="d-flex align-items-center mb-4">
        <img src="{{ asset('pictures/logo(1).png') }}" alt="Logo" style="height: 50px;" class="me-3">
        <span class="fw-bold fs-5" style="color: #E15A24;">Admin Panel</span>
    </div>
    
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ route('admin.dashboard') }}" 
               class="nav-link sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Home
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('kategori.index') }}" 
               class="nav-link sidebar-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                Category
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('makanan.index') }}" 
               class="nav-link sidebar-link {{ request()->routeIs('makanan.*') ? 'active' : '' }}">
                Recipe
            </a>
        </li>
        <li class="nav-item mt-4">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100">Logout</button>
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
    }
    .sidebar-link:hover {
        background-color: #E15A24;
        color: #fff;
    }
    .sidebar-link.active {
        background-color: #E15A24;
        color: #fff;
    }
</style>
