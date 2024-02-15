<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangsder extends Model
{
    use HasFactory;
    protected $table = 'barangseeder';

    protected $fillable = ['merk','seri','spesifikasi','stok','kategori_id'];

    // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}