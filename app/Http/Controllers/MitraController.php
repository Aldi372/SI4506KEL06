<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Illuminate\Support\Facades\Session;


class MitraController extends Controller
{
    public function store(Request $request)
        {
            $validatedData = $request->validate([
                'nama_toko' => 'required',
                'no_hp_toko' => 'required',
                'name' => 'required',
                'kategori' => 'required',
                'alamat_toko' => 'required',
            ]);

            $mitra = new Mitra();
            $mitra->nama_toko = $request->nama_toko;
            $mitra->no_hp_toko = $request->no_hp_toko;
            $mitra->name = $request->name;
            $mitra->kategori = $request->kategori;
            $mitra->alamat_toko = $request->alamat_toko;
            
            // dd($mitra);
            $mitra->save();

            Session::flash('success', 'Registrasi mitra berhasil.');


            return redirect()->route('customer.dashboard');
        }

    public function index()
        {
            $mitras = Mitra::all();
            return view('admin.list_mitra.verifikasi', compact('mitras'));
        }
}