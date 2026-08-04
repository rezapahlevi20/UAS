<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use App\Models\Permintaan;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Barang
        $total = Barang::count();

        // Barang Baik
        $baik = Barang::where('kondisi', 'Baik')->count();

        // Barang Rusak
        $rusak = Barang::where('kondisi', 'Rusak')->count();

        // Total User (role user)
        $user = User::where('role', 'user')->count();

        // Permintaan Menunggu
        $permintaan = Permintaan::where('status', 'Menunggu')->count();

        // Barang Terbaru
        $barangTerbaru = Barang::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'total',
            'baik',
            'rusak',
            'user',
            'permintaan',
            'barangTerbaru'
        ));
    }
}