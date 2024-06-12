<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileCustomerController extends Controller
{
    public function showProfile()
    {
        $userId = Auth::user()->id;
        $profil_customer = Auth::user();
        return view('customer.profil', compact('profil_customer'));
    }
    public function updateProfile(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        $request->validate([
            'foto' => 'nullable|image|max:2048',
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->no_hp = $request->input('phone');
        $user->tempat_lahir = $request->input('birthplace');
        $user->tanggal_lahir = $request->input('birthdate');
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/images/foto_profil');
            $user->foto = str_replace('public/', '', $fotoPath);
        }    
        $user->save();

        return redirect()->route('customer.profil')->with('success', 'Profil berhasil diperbarui');
    }
}