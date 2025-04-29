<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Makanan Berat',
                'deskripsi' => 'Menu utama yang mengenyangkan'
            ],
            [
                'nama_kategori' => 'Makanan Ringan',
                'deskripsi' => 'Cemilan ringan'
            ],
            [
                'nama_kategori' => 'Minuman',
                'deskripsi' => 'Berbagai macam minuman'
            ],
            [
                'nama_kategori' => 'Penutup',
                'deskripsi' => 'Makanan penutup setelah makan'
            ]
        ];

        foreach ($kategori as $item) {
            Kategori::create($item);
        }
    }
}
