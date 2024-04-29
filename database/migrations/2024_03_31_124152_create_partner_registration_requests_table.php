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
        Schema::create('partner_registration_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('nama_bisnis')->nullable();
            $table->string('nama_akun_medsos')->nullable();
            $table->string('kategori_menu')->nullable();
            $table->string('kategori_usaha')->nullable();
            $table->string('jumlah_pegawai')->nullable();
            $table->string('jumlah_pendapatan_perbulan')->nullable();
            $table->string('punya_toko_permanen')->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->string('kota_kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('logo_toko')->nullable();
            $table->string('punya_toko_cabang')->nullable();
            $table->string('uuid')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_registration_requests');
    }
};