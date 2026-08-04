@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Data Permintaan Barang
        </h2>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th>No</th>
                            <th>Nama User</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($permintaan as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            {{ $item->user->name }}

                        </td>

                        <td>

                            {{ $item->barang->nama_barang }}

                        </td>

                        <td>

                            {{ $item->jumlah }}

                        </td>

                        <td>

                            @if($item->status=='Menunggu')

                                <span class="badge bg-warning">

                                    Menunggu

                                </span>

                            @elseif($item->status=='Disetujui')

                                <span class="badge bg-success">

                                    Disetujui

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Ditolak

                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $item->created_at->format('d-m-Y H:i') }}

                        </td>

                        <td>

                            @if($item->status=='Menunggu')

                                <form
                                    action="{{ route('permintaan.setujui',$item->id) }}"
                                    method="POST"
                                    style="display:inline;">

                                    @csrf

                                    <button
                                        onclick="return confirm('Setujui permintaan ini?')"
                                        class="btn btn-success btn-sm">

                                        <i class="bi bi-check-circle"></i>

                                        Setujui

                                    </button>

                                </form>

                                <form
                                    action="{{ route('permintaan.tolak',$item->id) }}"
                                    method="POST"
                                    style="display:inline;">

                                    @csrf

                                    <button
                                        onclick="return confirm('Tolak permintaan ini?')"
                                        class="btn btn-danger btn-sm">

                                        <i class="bi bi-x-circle"></i>

                                        Tolak

                                    </button>

                                </form>

                            @else

                                <span class="text-muted">

                                    Sudah Diproses

                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            Belum ada permintaan barang.

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