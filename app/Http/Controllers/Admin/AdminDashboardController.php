<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
