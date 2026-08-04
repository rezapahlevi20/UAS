@extends('layouts.app')

@section('content')

<div class="container">

<h3>Riwayat Permintaan Barang</h3>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>No</th>

<th>Barang</th>

<th>Jumlah</th>

<th>Status</th>

<th>Tanggal</th>

</tr>

</thead>

<tbody>

@foreach($permintaan as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->barang->nama_barang }}</td>

<td>{{ $item->jumlah }}</td>

<td>

@if($item->status=="Menunggu")

<span class="badge bg-warning">

Menunggu

</span>

@elseif($item->status=="Disetujui")

<span class="badge bg-success">

Disetujui

</span>

@else

<span class="badge bg-danger">

Ditolak

</span>

@endif

</td>

<td>{{ $item->created_at->format('d-m-Y') }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection