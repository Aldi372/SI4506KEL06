<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PartnerRegistrationRequest;

class PartnerRegistrationController extends Controller
{
    public function index() {
        return view('partner-registration.index');
    }

    public function store(Request $request) {
        $request->validate([
            'email'                 => 'required',
            'nama_bisnis'           => 'required',
            'nama_akun_medsos'      => 'required',
            'kategori_menu'         => 'required',
            'kategori_usaha'        => 'required',
            'jumlah_pegawai'        => 'required',
            'jumlah_pendapatan'     => 'required',
            'alamat_usaha'          => 'required',
            'kota'                  => 'required',
            'kecamatan'             => 'required',
            'nomor_pemilik_usaha'   => 'required',
            'nomor_admin'           => 'required',
            'bank'                  => 'required',
            'nama_menu'             => 'required',
            'deskripsi_menu'        => 'required',
            'foto_produk'           => 'required',
            'know_from'             => 'required',
            'toko_cabang'           => 'required',
        ]);

        $registration = new PartnerRegistrationRequest();
        $registration->email = $request->email;
        $registration->nama_bisnis = $request->nama_bisnis;
        $registration->nama_akun_medsos = $request->nama_akun_medsos;
        if ($request->kategori_menu == 'other') {
            $registration->kategori_menu = $request->kategori_menu_lain;
        } else {
            $registration->kategori_menu = $request->kategori_menu;
        }
        $registration->kategori_usaha = $request->kategori_usaha;
        $registration->jumlah_pegawai = $request->jumlah_pegawai;
        $registration->jumlah_pendapatan_perbulan = $request->jumlah_pendapatan;
        $registration->punya_toko_permanen = $request->toko_permanen;
        $registration->alamat_usaha = $request->alamat_usaha;
        $registration->kota_kabupaten = $request->kota;
        $registration->kecamatan = $request->kecamatan;
        if ($request->file('kartu_identitas')) {
            $imageName = $request->file('kartu_identitas')->hashName();
            $request->file('kartu_identitas')->storeAs('public/foto-ktp', $imageName);
            $registration->foto_ktp = "foto-ktp/$imageName";
        }
        // $registration->foto_ktp = $request->kartu_identitas;
        $registration->nomor_pemilik_usaha = $request->nomor_pemilik_usaha;
        $registration->nomor_admin = $request->nomor_admin;
        $registration->rincian_perbankan = $request->bank;
        if ($request->file('logo_toko')) {
            $imageName = $request->file('logo_toko')->hashName();
            $request->file('logo_toko')->storeAs('public/logo-toko', $imageName);
            $registration->logo_toko = "logo-toko/$imageName";
        }
        // $registration->logo_toko = $request->logo_toko;
        $registration->nama_menu = $request->nama_menu;
        $registration->deskripsi_menu = $request->deskripsi_menu;
        $registration->harga_normal = $request->harga;
        if ($request->file('foto_produk')) {
            $imageName = $request->file('foto_produk')->hashName();
            $request->file('foto_produk')->storeAs('public/foto-produk', $imageName);
            $registration->foto_produk = "foto-produk/$imageName";
        }
        // $registration->foto_produk = $request->foto_produk;
        $registration->dapat_info_dari = $request->know_from;
        $registration->punya_toko_cabang = $request->toko_cabang;
        $registration->uuid = Str::uuid();
        $registration->save();

        return redirect(route('registration.index'))->with('success', 'success');
    }
}
