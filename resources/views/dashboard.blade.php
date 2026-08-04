@extends('layouts.app')

@section('content')

<div class="row">

<div class="col-md-4">

<div class="card bg-primary text-white">

<div class="card-body text-center">

<h5>Total Barang</h5>

<h1>{{ $total }}</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card bg-success text-white">

<div class="card-body text-center">

<h5>Barang Baik</h5>

<h1>{{ $baik }}</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card bg-danger text-white">

<div class="card-body text-center">

<h5>Barang Rusak</h5>

<h1>{{ $rusak }}</h1>

</div>

</div>

</div>

</div>

<div class="card mt-4">

<div class="card-body">

<h4>

Selamat Datang

{{ Auth::user()->name }}

</h4>

<p>

Silakan pilih menu di sebelah kiri.

</p>

<a href="/barang" class="btn btn-primary">

Kelola Inventaris

</a>

</div>

</div>

@endsection