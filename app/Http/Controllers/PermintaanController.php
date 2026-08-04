<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermintaanController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    // Daftar Barang

    public function index(Request $request)
    {

        $search = $request->search;

        $barang = Barang::when($search, function($query) use ($search){

            $query->where('nama_barang','like','%'.$search.'%')
                  ->orWhere('kode_barang','like','%'.$search.'%');

        })->latest()->get();

        return view('user.barang', compact('barang'));

    }

    // Form Ajukan

    public function create($id)
    {

        $barang = Barang::findOrFail($id);

        return view('user.ajukan', compact('barang'));

    }

    // Simpan Permintaan

    public function store(Request $request)
    {

        $request->validate([

            'barang_id'=>'required',

            'jumlah'=>'required|integer|min:1',

        ]);

        Permintaan::create([

            'user_id'=>Auth::id(),

            'barang_id'=>$request->barang_id,

            'jumlah'=>$request->jumlah,

            'status'=>'Menunggu',

        ]);

        return redirect()

            ->route('permintaan.riwayat')

            ->with('success','Permintaan berhasil dikirim.');

    }

    // Riwayat User

    public function riwayat()
    {

        $permintaan = Permintaan::with('barang')

            ->where('user_id',Auth::id())

            ->latest()

            ->get();

        return view('user.riwayat', compact('permintaan'));

    }



    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    // Semua Permintaan

    public function adminIndex()
    {

        $permintaan = Permintaan::with('user','barang')

            ->latest()

            ->get();

        return view('admin.permintaan.index', compact('permintaan'));

    }

    // Setujui

    public function setujui($id)
    {

        $permintaan = Permintaan::findOrFail($id);

        if($permintaan->status != 'Menunggu')
        {

            return back()->with('error','Permintaan sudah diproses.');

        }

        $barang = Barang::findOrFail($permintaan->barang_id);

        if($barang->jumlah < $permintaan->jumlah)
        {

            return back()->with('error','Stok barang tidak mencukupi.');

        }

        $barang->jumlah -= $permintaan->jumlah;

        $barang->save();

        $permintaan->status = 'Disetujui';

        $permintaan->save();

        return back()->with('success','Permintaan berhasil disetujui.');

    }

    // Tolak

    public function tolak($id)
    {

        $permintaan = Permintaan::findOrFail($id);

        if($permintaan->status == 'Menunggu')
        {

            $permintaan->status = 'Ditolak';

            $permintaan->save();

        }

        return back()->with('success','Permintaan berhasil ditolak.');

    }

}