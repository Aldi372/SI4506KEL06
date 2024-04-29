<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index',compact('menus')); //harus sama dengan nama variabel di line sebelumnnya
    }

    public function create() 
    {
        return view('menus.create');
    }
    

    public function store(Request $request) 
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'expired' => 'required|date', 
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg|max:10240', //masih gabisa klo filenya mb
        ]);
        
        // Check if file is uploaded
        if ($request->hasFile('foto_produk')) {
            // Store the file
            $foto_produk_path = $request->file('foto_produk')->storeAs('img/menu', $request->file('foto_produk')->getClientOriginalName(), 'public');
            //Add file path to data array
            $data['foto_produk'] = $foto_produk_path;
            $file = $request->file('foto_produk');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'foto_produk/menu/';
            // Ensure directory exists and has correct permissions
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $file->move($path, $filename);
        }

        $data = [
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'expired' => $request->expired,
            'foto_produk' => isset($path) ? $path.$filename : null,
        ];
    
        
        // Create Menu
        Menu::create($data);
        return redirect('/menus')->with('success','Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('menus.edit', compact(['menu']));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'expired' => 'required|date', 
            'foto_produk' => 'image|mimes:jpeg,png,jpg|max:10240', //masih gabisa klo filenya mb
        ]);

        $menu = Menu::find($id);

        // Check if file is uploaded
        if ($request->hasFile('foto_produk')) {
            // Store the file
            $foto_produk_path = $request->file('foto_produk')->storeAs('img/menu', $request->file('foto_produk')->getClientOriginalName(), 'public');
            //Add file path to data array
            $data['foto_produk'] = $foto_produk_path;
            // Hapus file foto_produk lama jika ada
            if ($menu->foto_produk && file_exists($menu->foto_produk)) {
                unlink($menu->foto_produk);
            }
        } else {
            // Jika tidak ada file baru yang diunggah, gunakan foto_produk yang ada
            $data['foto_produk'] = $menu->foto_produk;
        }

        // Set other data
        $data['nama_produk'] = $request->nama_produk;
        $data['deskripsi'] = $request->deskripsi;
        $data['kategori'] = $request->kategori;
        $data['harga'] = $request->harga;
        $data['stok'] = $request->stok;
        $data['expired'] = $request->expired;
        
        // Create Menu
        $menu->update($data);
        return redirect('/menus')->with('success','Menu berhasil diubah!');
    }

    public function destroy($id) 
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('/menus')->with('success','Menu berhasil dihapus!');
    }
}

