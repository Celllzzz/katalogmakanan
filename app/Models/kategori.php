<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class kategori extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori', 'deskripsi'];
    protected $dates = ['deleted_at']; //soft delete

    //relasi: memiliki banyak makanan'
    public function makanan(){
        return $this->hasMany(makanan::class, 'id_kategori', 'id_kategori');
    }

    public function toSearchableArray()
    {
        return [
            'nama_kategori' => $this->nama_kategori
        ];
    }
}
