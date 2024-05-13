<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['nama_produk', 'deskripsi', 'kategori', 'harga', 'stok', 'expired', 'foto_produk'];
    
    protected $guarded = ['id'];
}
