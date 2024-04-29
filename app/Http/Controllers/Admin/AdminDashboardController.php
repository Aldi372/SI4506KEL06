<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PartnerRegistrationRequest;

class AdminDashboardController extends Controller
{
    public function index() {
        $datas = PartnerRegistrationRequest::all()->sortByDesc('created_at');
        $dataPending = PartnerRegistrationRequest::where('status', 'pending')->count();
        $dataAccepted = PartnerRegistrationRequest::where('status', 'accepted')->count();
        $dataRejected = PartnerRegistrationRequest::where('status', 'rejected')->count();
        return view('admin.dashboard.index', compact('datas', 'dataPending', 'dataAccepted', 'dataRejected'));
    }

    public function view($uuid) {
        $data = PartnerRegistrationRequest::where('uuid', $uuid)->firstOrFail();
        return view('admin.dashboard.view', compact('data'));
    }

    public function updateStatus(Request $request) {
        $request->validate([
            'uuid' => 'required',
            'action' => 'required'
        ]);

        $data = PartnerRegistrationRequest::where('uuid', $request->uuid)->firstOrFail();
        if ($request->action == 'accept') {
            PartnerData::create([
                'email' => $data->email,
                'nama_bisnis' => $data->nama_bisnis,
                'nama_akun_medsos' => $data->nama_akun_medsos,
                'kategori_menu' => $data->kategori_menu,
                'kategori_usaha' => $data->kategori_usaha,
                'jumlah_pegawai' => $data->jumlah_pegawai,
                'jumlah_pendapatan_perbulan' => $data->jumlah_pendapatan_perbulan,
                'punya_toko_permanen' => $data->punya_toko_permanen,
                'alamat_usaha' => $data->alamat_usaha,
                'kota_kabupaten' => $data->kota_kabupaten,
                'kecamatan' => $data->kecamatan,
                'foto_ktp' => $data->foto_ktp,
                'nomor_pemilik_usaha' => $data->nomor_pemilik_usaha,
                'nomor_admin' => $data->nomor_admin,
                'rincian_perbankan' => $data->rincian_perbankan,
                'logo_toko' => $data->logo_toko,
                'nama_menu' => $data->nama_menu,
                'deskripsi_menu' => $data->deskripsi_menu,
                'harga_normal' => $data->harga_normal,
                'foto_produk' => $data->foto_produk,
                'dapat_info_dari' => $data->dapat_info_dari,
                'punya_toko_cabang' => $data->punya_toko_cabang,
                'uuid' => $data->uuid
            ]);

            $data->status = 'accepted';
            $data->update();
            return redirect(route('admin.dashboard.index'))->with('success', 'Data berhasil di update');
        } 
        
        else if ($request->action == 'reject') {
            $data->status = 'rejected';
            $data->update();
            return redirect(route('admin.dashboard.index'))->with('success', 'Data berhasil di update');
        } 
        
        elseif ($request->action == 'delete') {
            if (Storage::exists("public/$data->foto_ktp")) {
                Storage::delete("public/$data->foto_ktp");
            }

            if (Storage::exists("public/$data->logo_toko")) {
                Storage::delete("public/$data->logo_toko");
            }

            if (Storage::exists("public/$data->foto_produk")) {
                Storage::delete("public/$data->foto_produk");
            }

            $data->delete();

            return redirect(route('admin.dashboard.index'))->with('success', 'Data berhasil di hapus');
        }
    }
}
