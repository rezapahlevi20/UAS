<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'jumlah',
        'harga',
        'kondisi',
        'tanggal_masuk',
    ];
    public function permintaans()
{
    return $this->hasMany(Permintaan::class);
}
}