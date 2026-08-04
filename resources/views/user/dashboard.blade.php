@extends('layouts.app')

@section('content')

<h3>Daftar Barang</h3>

<table class="table table-bordered">

<tr>

<th>No</th>

<th>Kode</th>

<th>Nama Barang</th>

<th>Kategori</th>

<th>Jumlah</th>

<th>Harga</th>

<th>Kondisi</th>

</tr>

@foreach($barang as $b)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $b->kode_barang }}</td>

<td>{{ $b->nama_barang }}</td>

<td>{{ $b->kategori }}</td>

<td>{{ $b->jumlah }}</td>

<td>Rp {{ number_format($b->harga,0,',','.') }}</td>

<td>{{ $b->kondisi }}</td>

</tr>

@endforeach

</table>

@endsection