<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Menampilkan Semua Barang
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->search;

        $barang = Barang::when($search, function ($query) use ($search) {

            $query->where('nama_barang', 'like', '%' . $search . '%')
                  ->orWhere('kode_barang', 'like', '%' . $search . '%');

        })
        ->latest()
        ->get();

        return view('admin.barang.index', compact('barang'));
    }

    /*
    |--------------------------------------------------------------------------
    | Form Tambah Barang
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.barang.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan Barang
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang'   => 'required|unique:barangs,kode_barang',
            'nama_barang'   => 'required',
            'kategori'      => 'required',
            'jumlah'        => 'required|integer|min:1',
            'harga'         => 'required|numeric|min:0',
            'kondisi'       => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        Barang::create([
            'kode_barang'   => $request->kode_barang,
            'nama_barang'   => $request->nama_barang,
            'kategori'      => $request->kategori,
            'jumlah'        => $request->jumlah,
            'harga'         => $request->harga,
            'kondisi'       => $request->kondisi,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Barang
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $barang = Barang::findOrFail($id);

        return view('admin.barang.show', compact('barang'));
    }

    /*
    |--------------------------------------------------------------------------
    | Form Edit Barang
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);

        return view('admin.barang.edit', compact('barang'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Barang
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kode_barang'   => 'required|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang'   => 'required',
            'kategori'      => 'required',
            'jumlah'        => 'required|integer|min:1',
            'harga'         => 'required|numeric|min:0',
            'kondisi'       => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $barang->update([
            'kode_barang'   => $request->kode_barang,
            'nama_barang'   => $request->nama_barang,
            'kategori'      => $request->kategori,
            'jumlah'        => $request->jumlah,
            'harga'         => $request->harga,
            'kondisi'       => $request->kondisi,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | Hapus Barang
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil dihapus.');
    }
}