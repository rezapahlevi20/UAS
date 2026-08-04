@extends('layouts.app')

@section('content')

<div class="container">

<div class="card">

<div class="card-header bg-primary text-white">

<h4>Ajukan Permintaan Barang</h4>

</div>

<div class="card-body">

<form action="{{ route('permintaan.store') }}" method="POST">

@csrf

<input type="hidden"
name="barang_id"
value="{{ $barang->id }}">

<div class="mb-3">

<label>Nama Barang</label>

<input
type="text"
class="form-control"
value="{{ $barang->nama_barang }}"
readonly>

</div>

<div class="mb-3">

<label>Stok Saat Ini</label>

<input
type="text"
class="form-control"
value="{{ $barang->jumlah }}"
readonly>

</div>

<div class="mb-3">

<label>Jumlah Permintaan</label>

<input
type="number"
name="jumlah"
class="form-control"
min="1"
max="{{ $barang->jumlah }}"
required>

</div>

<button class="btn btn-success">

Ajukan Permintaan

</button>

<a href="{{ route('user.barang') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

@endsection