<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->text('Email');
            $table->text('Nama Bisnis');
            $table->text('AKun Medsos');
            $table->enum('Kategori Menu',['Roti/Kue'],['Sayuran/Buah'],['Frozen food'],['Makanan Sehat/Salad'],['Minuman'],['Makanan ringan/Cemilan'],['Makanan Berat']);
            $table->enum('Kategori Usaha',['Restoran'],['Hotel'],['Supermarket'],['Produk rumahan'],['Cake and Bakery'],['Warung makan'],['Cafe']);
            $table->enum('Jumlah Pegawai',['1-5 Pegawai'],['5-10 Pegawai'],['10-15 Pegawai'],['Lebih dari 15 Pegawai']);
            $table->enum('income',['1 Juta - 5 Juta'],['5 Juta - 15 Juta'],['15 Juta - 25 Juta'],['25 Juta - 50 Juta'],['Lebih dari 50 Juta']);
            $table->enum('Outlet Permanen',['Ya'],['Tidak']);
            $table->text('Alamat');
            $table->enum('Kota',['Jakarta'],['Surabaya'],['Bandung'],['Medan'],['Semarang'],['DIY'],['Makasar'],['Palembang'],['Samarinda'],['Papua'],['Bali']);
            $table->Text('Kecamatan');
            $table->string('Kartu Indentitas');
            $table->string('No Tlp owner');
            $table->string('No Tlp admin');
            $table->string('Rekening');
            $table->string('Logo');
            $table->text('Nama Menu');
            $table->text('Deskripsi Menu');
            $table->text('Harga Normal');
            $table->string('Foto Produk');
            $table->enum('Asal Informasi',['Instagram'],['Rekan'],['Youtube'],['Playstore'],['Website'],['Tiktok'],['Twitter']);
            $table->enum('Cabang Toko',['Ya'],['Tidak']);
            $table->string('Persetujuan',['Ya'],['Tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form');
    }
};
