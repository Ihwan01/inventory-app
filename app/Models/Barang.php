<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'stok',
        'kategori',
        'is_deleted',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_deleted', 0); // Mengambil barang yang aktif
    }

    public function scopeDeleted($query)
    {
        return $query->where('is_deleted', 1); // Mengambil barang yang terhapus
    }
}
