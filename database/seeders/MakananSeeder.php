<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Makanan;

class MakananSeeder extends Seeder
{
    public function run(): void
    {
        Makanan::create([
            'nama_makanan' => 'Nasi Goreng',
            'id_kategori' => 4,
            'deskripsi' => 'Nasi goreng khas Indonesia dengan bumbu rempah pilihan.',
            'resep' => 'Nasi, bawang putih, kecap, telur, ayam',
            'cara_masak' => 'Tumis bumbu, masukkan nasi dan bahan lainnya, aduk hingga rata.',
            'gambar' => 'nasi_goreng.jpg',
        ]);
    }
}
