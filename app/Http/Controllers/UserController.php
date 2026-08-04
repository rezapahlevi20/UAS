<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class UserController extends Controller
{
    public function index()
    {
        $barang = Barang::all();

        return view('user.dashboard', compact('barang'));
    }
}