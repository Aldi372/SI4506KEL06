<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password, 'role' => 'Admin'])){
            $request->session()->regenerate();
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
