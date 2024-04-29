<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerData extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'nama_bisnis',
        'nama_akun_medsos',
        'kategori_menu',
        'kategori_usaha',
        'jumlah_pegawai',
        'jumlah_pendapatan_perbulan',
        'punya_toko_permanen',
        'alamat_usaha',
        'kota_kabupaten',
        'kecamatan',
        'foto_ktp',
        'nomor_pemilik_usaha',
        'nomor_admin',
        'rincian_perbankan',
        'logo_toko',
        'nama_menu',
        'deskripsi_menu',
        'harga_normal',
        'foto_produk',
        'dapat_info_dari',
        'punya_toko_cabang',
    ];
    
}
