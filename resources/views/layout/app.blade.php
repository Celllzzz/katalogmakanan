<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('pictures/logo(2).png') }}">
    
    <!-- Link ke file CSS terpisah -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

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
            @include('components.sidebar')
        </div>

        <!-- Main content -->
        <div class="flex-grow-1 d-flex flex-column">
            <!-- Topbar -->
            @include('components.topbar')

            <!-- Page content -->
            <main class="p-4 flex-grow-1">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>