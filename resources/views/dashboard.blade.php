@extends('layout.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1 class="mb-4">Selamat Datang, {{ $adminName ?? 'Admin' }}!</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Kategori</h5>
                        <p class="card-text display-6">{{ $totalCategory ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Makanan</h5>
                        <p class="card-text display-6">{{ $totalRecipe ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
