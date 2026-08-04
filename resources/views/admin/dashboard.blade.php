@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col">
            <h2 class="fw-bold">
                Dashboard Admin
            </h2>

            <p class="text-muted">
                Selamat datang,
                <strong>{{ Auth::user()->name }}</strong>
            </p>
        </div>

    </div>

    <div class="row">

        <!-- Total Barang -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">
                                Total Barang
                            </h6>

                            <h2 class="fw-bold">
                                {{ $total }}
                            </h2>

                        </div>

                        <div>

                            <i class="bi bi-box-seam fs-1 text-primary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Barang Baik -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">
                                Barang Baik
                            </h6>

                            <h2 class="fw-bold text-success">
                                {{ $baik }}
                            </h2>

                        </div>

                        <div>

                            <i class="bi bi-check-circle-fill fs-1 text-success"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Barang Rusak -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">
                                Barang Rusak
                            </h6>

                            <h2 class="fw-bold text-danger">
                                {{ $rusak }}
                            </h2>

                        </div>

                        <div>

                            <i class="bi bi-exclamation-triangle-fill fs-1 text-danger"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Permintaan -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">
                                Permintaan Menunggu
                            </h6>

                            <h2 class="fw-bold text-warning">
                                {{ $permintaan }}
                            </h2>

                        </div>

                        <div>

                            <i class="bi bi-clipboard-check-fill fs-1 text-warning"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Total User -->

    <div class="row">

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">

                                Total User

                            </h6>

                            <h2 class="fw-bold text-info">

                                {{ $user }}

                            </h2>

                        </div>

                        <div>

                            <i class="bi bi-people-fill fs-1 text-info"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Shortcut Menu -->

    <div class="row mt-3">

        <div class="col-md-4 mb-4">

            <div class="card shadow">

                <div class="card-body text-center">

                    <i class="bi bi-box-seam fs-1 text-primary"></i>

                    <h4 class="mt-3">

                        Data Barang

                    </h4>

                    <p>

                        Kelola seluruh data inventaris toko bangunan.

                    </p>

                    <a href="{{ url('/barang') }}" class="btn btn-primary">

                        Kelola Barang

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card shadow">

                <div class="card-body text-center">

                    <i class="bi bi-clipboard-check fs-1 text-success"></i>

                    <h4 class="mt-3">

                        Permintaan Barang

                    </h4>

                    <p>

                        Lihat dan setujui permintaan dari user.

                    </p>

                    <a href="{{ url('/admin/permintaan') }}" class="btn btn-success">

                        Lihat Permintaan

                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card shadow">

                <div class="card-body text-center">

                    <i class="bi bi-person-circle fs-1 text-warning"></i>

                    <h4 class="mt-3">

                        Administrator

                    </h4>

                    <p>

                        Anda login sebagai Administrator Sistem.

                    </p>

                    <button class="btn btn-warning" disabled>

                        Admin

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- Informasi -->

    <div class="card shadow mt-4">

        <div class="card-header bg-primary text-white">

            Informasi Sistem

        </div>

        <div class="card-body">

            <p>

                Sistem Inventaris Toko Bangunan digunakan untuk mengelola seluruh
                data barang, memantau kondisi barang, serta mengelola permintaan
                barang dari user. Melalui dashboard ini administrator dapat
                memonitor jumlah inventaris, jumlah barang berdasarkan kondisi,
                serta jumlah permintaan yang sedang menunggu persetujuan.

            </p>

        </div>

    </div>

</div>

@endsection