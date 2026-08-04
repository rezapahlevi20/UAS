<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

   public function proses(Request $request)
{
    $data = $request->validate([
        'email'=>'required|email',
        'password'=>'required'
    ]);

    if(Auth::attempt($data))
    {
        $request->session()->regenerate();

        if(Auth::user()->role=='admin')
        {
            return redirect('/dashboard');
        }

        return redirect('/user/dashboard');
    }

    return back()->with('error','Email atau Password Salah');
}
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}