<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class AdminAuthController extends Controller
{
    public function index() {
        return view('admin.auth.login');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'username'     => 'required',
                'password'     => 'required',
            ]
        );

        if(Auth::attempt(['name'=>$request->username, 'password'=>$request->password, 'role' => 'admin'])){
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role === 'customer') {
                $user->role = 'mitra';
                $user->save();
            }

            return redirect()->route('admin.dashboard.index');
        }else{
            return back()->withErrors(['password' => 'Incorrect Credential']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('admin.auth.login'));
    }
}