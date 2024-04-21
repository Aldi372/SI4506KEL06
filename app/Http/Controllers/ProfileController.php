<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    // Menampilkan formulir untuk mengubah profil


    public function index()
    {
        $user = Auth::user();
        if ($user -> ttl == ''|| $user -> alamat == ''){
            return redirect()->route('profile.edit');
        }
        return view('admin.show', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('admin.edit_profile', compact('user'));
    }

    // Menyimpan perubahan pada profil yang diubah
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi data profil yang diubah
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            "ttl" => 'required|string|max:255',
            'alamat' => 'required|string|max:300'
            // Tambahkan validasi untuk data lainnya
        ]);

        // Update profil user dengan data baru
        $user->update($request->all());

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }

    // Menghapus profil
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        // Logout user setelah profil dihapus
        Auth::logout();

        return redirect()->route('profile.index')->with('success', 'Your profile has been deleted!');
    }
    public function show()
    {
        $user = Auth::user();
        return view('admin.show', compact('user'));
    }
}
