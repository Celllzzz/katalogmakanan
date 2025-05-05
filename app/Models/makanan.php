<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class makanan extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $table = 'makanan';
    protected $primaryKey = 'id_makanan';
    protected $fillable = ['nama_makanan', 'id_kategori', 'resep', 'deskripsi', 'cara_masak', 'gambar'];
    protected $dates = ['deleted_at']; // soft delete

    public function kategori(){
        return $this->belongsTo(kategori::class, 'id_kategori', 'id_kategori');
    }

    public function toSearchableArray()
    {
        return [
            'nama_makanan' => $this->nama_makanan
        ];
    }
}