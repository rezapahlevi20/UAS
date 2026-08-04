@extends('layouts.app')

@section('content')

<div class="container">

    <h3 class="mb-4">Daftar Barang</h3>

    <div class="row mb-3">
        <div class="col-md-5">
            <form action="{{ route('user.barang') }}" method="GET">
                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Cari nama barang..."
                       value="{{ request('search') }}">
            </form>
        </div>
    </div>

    <table class="table table-bordered table-hover">

        <thead class="table-primary">

        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Kondisi</th>
            <th>Aksi</th>
        </tr>

        </thead>

        <tbody>

        @forelse($barang as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->kode_barang }}</td>

            <td>{{ $item->nama_barang }}</td>

            <td>{{ $item->kategori }}</td>

            <td>{{ $item->jumlah }}</td>

            <td>Rp {{ number_format($item->harga,0,',','.') }}</td>

            <td>

                @if($item->kondisi=="Baik")

                    <span class="badge bg-success">
                        Baik
                    </span>

                @else

                    <span class="badge bg-danger">
                        Rusak
                    </span>

                @endif

            </td>

            <td>

                <a href="{{ route('permintaan.create',$item->id) }}"
                   class="btn btn-primary btn-sm">

                    Ajukan

                </a>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="8" class="text-center">

                Data tidak ditemukan

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection