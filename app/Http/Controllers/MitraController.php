<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


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
            $mitras = Mitra::where('status', 'PENDING')->get();
            return view('admin.list_mitra.verifikasi', compact('mitras'));
        }

    public function show($id)
        {
            $mitras = Mitra::where('status', 'PENDING')->findOrFail($id);
            return view('admin.list_mitra.show', compact('mitras'));
        }
    public function accept($id)
        {
            $mitra = Mitra::findOrFail($id);
    

            $mitra->status = 'ACCEPT';
            $mitra->save();
    

            $user = User::where('name', $mitra->name)->first();
            if ($user) {
                $user->role = 'mitra';  
                $user->save();
            }
    
            return redirect()->route('admin.dashboard')->with('success', 'Mitra berhasil diterima dan peran pengguna diperbarui.');
        }
    public function create()
        {
            $user = auth()->user();
            $mitra = Mitra::where('user_id', $user->id)->first();
            return view('menus.create', compact('mitra'));
        }

    public function listNamaToko()
        {
            $mitras = Mitra::all(['nama_toko']);
            return view('menus.create', compact('mitras'));
        }
    public function dataNamaToko()
        {
            $mitras = Mitra::where('status', 'ACCEPT')->get();
            return view('admin.daftar_toko.index', compact('mitras'));
        }

    public function mitraDashboard()
        {
            $user = Auth::user();
            $mitra = Mitra::where('name', $user->name)->first();

        
            return view('mitra.dashboard', compact('mitra'));
        }
    public function profil()
        {
            $user = Auth::user();
            $mitra = Mitra::where('name', $user->name)->first();
        
            return view('mitra.profil', compact('mitra'));
        }
    public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'nama_toko' => 'required',
                'no_hp_toko' => 'required',
                'kategori' => 'required',
                'alamat_toko' => 'required',
            ]);
        
            $mitra = Mitra::findOrFail($id);
            $mitra->nama_toko = $request->nama_toko;
            $mitra->no_hp_toko = $request->no_hp_toko;
            $mitra->kategori = $request->kategori;
            $mitra->alamat_toko = $request->alamat_toko;
            $mitra->save();

            Menu::where('nama_toko', $mitra->name)
            ->update(['nama_toko' => $request->nama_toko]);
        
            return redirect()->route('mitra.dashboard')->with('success', 'Data toko berhasil diperbarui.');
        }
    public function listMitra()
        {
            $mitras = Mitra::all(['nama_toko', 'name']);
            return view('customer.list_mitra', compact('mitras'));
        }
        

}