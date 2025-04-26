<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori', 'deskripsi'];
    protected $date = ['deleted_at']; //soft delete

    //relasi: memiliki banyak makanan'
    public function makanans(){
        return $this->hasMany(makanan::class, 'id_kategori', 'id_kategori');
    }
}
