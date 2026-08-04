@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Data Barang
        </h2>

        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Barang
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <form action="{{ route('barang.index') }}" method="GET">

                <div class="row mb-3">

                    <div class="col-md-4">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama atau kode barang..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary">

                            <i class="bi bi-search"></i>

                            Cari

                        </button>

                    </div>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th width="60">No</th>

                            <th>Kode Barang</th>

                            <th>Nama Barang</th>

                            <th>Kategori</th>

                            <th>Jumlah</th>

                            <th>Harga</th>

                            <th>Kondisi</th>

                            <th>Tanggal Masuk</th>

                            <th width="180">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($barang as $item)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $item->kode_barang }}

                            </td>

                            <td>

                                {{ $item->nama_barang }}

                            </td>

                            <td>

                                {{ $item->kategori }}

                            </td>

                            <td>

                                {{ $item->jumlah }}

                            </td>

                            <td>

                                Rp {{ number_format($item->harga,0,',','.') }}

                            </td>

                            <td>

                                @if($item->kondisi=='Baik')

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

                                {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}

                            </td>

                            <td>

                                <a href="{{ route('barang.edit',$item->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                    Edit

                                </a>

                                <form action="{{ route('barang.destroy',$item->id) }}"
                                      method="POST"
                                      style="display:inline;">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">

                                        <i class="bi bi-trash"></i>

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" class="text-center">

                                Belum ada data barang.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection