<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminDaftarTokoController extends Controller
{
    public function index() {
        $datas = PartnerData::all()->sortByDesc('created_at');
        $allData = PartnerData::select('id')->count();
        $dataActive = PartnerData::where('status', 'active')->count();
        $dataNonActive = PartnerData::where('status', 'non-active')->count();
        $dataSuspended = PartnerData::where('status', 'suspended')->count();
        return view('admin.toko.index', compact('datas', 'allData', 'dataActive', 'dataNonActive', 'dataSuspended'));
    }

    public function action($id) {
        $data = PartnerData::where('id', $id)->firstOrFail();
        return view('admin.toko.action', compact('data'));
    }


    public function updateStatus(Request $request)
    {
        // Ambil data dari request
        $id = $request->input('id');
        $status = $request->input('status');

        // Update status di database berdasarkan $id
        // $data = PartnerData::findOrFail($id);
        $data = PartnerData::where('id', $id)->firstorFail();
        $data->status = $status;
        $data->save();

        // Tentukan apakah tombol delete harus ditampilkan
        $delete = in_array($status, ['non-active', 'suspended']);

        // Kirim respons
        return response()->json(['success' => true, 'delete' => $delete]);
        }



    // public function updateStatus(Request $request) {
    //     $request->validate([
    //         'id' => 'required',
    //         'action' => 'required'
    //     ]);

    //     $data = PartnerData::where('id', $request->uuid)->firstOrFail();
    //     if ($request->action == 'active') {
    //         $data->status = 'active';
    //         $data->update();
    //         return redirect(route('admin.daftatoko.index'))->with('success', 'Data berhasil di update');
    //     } 
        
    //     else if ($request->action == 'non-active') {
    //         $data->status = 'non-active';
    //         $data->update();
    //         return redirect(route('admin.daftartoko.index'))->with('success', 'Data berhasil di update');
    //     } 
        
    //     elseif ($request->action == 'delete') {
    //         if (Storage::exists("public/$data->foto_ktp")) {
    //             Storage::delete("public/$data->foto_ktp");
    //         }

    //         if (Storage::exists("public/$data->logo_toko")) {
    //             Storage::delete("public/$data->logo_toko");
    //         }

    //         if (Storage::exists("public/$data->foto_produk")) {
    //             Storage::delete("public/$data->foto_produk");
    //         }

    //         $data->delete();

    //         return redirect(route('admin.daftartoko.index'))->with('success', 'Data berhasil di hapus');
    //     }
    // }


}
