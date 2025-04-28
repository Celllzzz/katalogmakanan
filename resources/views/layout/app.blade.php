<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Main content -->
        <div class="flex-grow-1">
            <!-- Topbar -->
            @include('components.topbar')

            <!-- Page content -->
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
