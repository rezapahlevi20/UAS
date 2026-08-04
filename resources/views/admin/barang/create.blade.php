@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        Tambah Data Barang
                    </h4>

                </div>

                <div class="card-body">

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('barang.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">

                                Kode Barang

                            </label>

                            <input
                                type="text"
                                name="kode_barang"
                                class="form-control"
                                value="{{ old('kode_barang') }}"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Nama Barang

                            </label>

                            <input
                                type="text"
                                name="nama_barang"
                                class="form-control"
                                value="{{ old('nama_barang') }}"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Kategori

                            </label>

                            <select
                                name="kategori"
                                class="form-select"
                                required>

                                <option value="">-- Pilih Kategori --</option>

                                <option value="Material">Material</option>

                                <option value="Peralatan">Peralatan</option>

                                <option value="Cat">Cat</option>

                                <option value="Listrik">Listrik</option>

                                <option value="Pipa">Pipa</option>

                                <option value="Keramik">Keramik</option>

                                <option value="Lainnya">Lainnya</option>

                            </select>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">

                                        Jumlah

                                    </label>

                                    <input
                                        type="number"
                                        name="jumlah"
                                        class="form-control"
                                        value="{{ old('jumlah') }}"
                                        required>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">

                                        Harga

                                    </label>

                                    <input
                                        type="number"
                                        name="harga"
                                        class="form-control"
                                        value="{{ old('harga') }}"
                                        required>

                                </div>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Kondisi Barang

                            </label>

                            <select
                                name="kondisi"
                                class="form-select"
                                required>

                                <option value="">-- Pilih Kondisi --</option>

                                <option value="Baik">Baik</option>

                                <option value="Rusak">Rusak</option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Tanggal Masuk

                            </label>

                            <input
                                type="date"
                                name="tanggal_masuk"
                                class="form-control"
                                value="{{ old('tanggal_masuk') }}"
                                required>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('barang.index') }}"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>

                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary">

                                <i class="bi bi-save"></i>

                                Simpan Barang

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection