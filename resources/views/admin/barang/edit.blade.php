@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="card shadow">

                <div class="card-header bg-warning">

                    <h4 class="mb-0 text-dark">
                        Edit Data Barang
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

                    <form action="{{ route('barang.update',$barang->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">

                                Kode Barang

                            </label>

                            <input
                                type="text"
                                name="kode_barang"
                                class="form-control"
                                value="{{ old('kode_barang',$barang->kode_barang) }}"
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
                                value="{{ old('nama_barang',$barang->nama_barang) }}"
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

                                <option value="Material" {{ $barang->kategori=='Material' ? 'selected' : '' }}>Material</option>

                                <option value="Peralatan" {{ $barang->kategori=='Peralatan' ? 'selected' : '' }}>Peralatan</option>

                                <option value="Cat" {{ $barang->kategori=='Cat' ? 'selected' : '' }}>Cat</option>

                                <option value="Listrik" {{ $barang->kategori=='Listrik' ? 'selected' : '' }}>Listrik</option>

                                <option value="Pipa" {{ $barang->kategori=='Pipa' ? 'selected' : '' }}>Pipa</option>

                                <option value="Keramik" {{ $barang->kategori=='Keramik' ? 'selected' : '' }}>Keramik</option>

                                <option value="Lainnya" {{ $barang->kategori=='Lainnya' ? 'selected' : '' }}>Lainnya</option>

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
                                        value="{{ old('jumlah',$barang->jumlah) }}"
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
                                        value="{{ old('harga',$barang->harga) }}"
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

                                <option value="Baik" {{ $barang->kondisi=='Baik' ? 'selected' : '' }}>
                                    Baik
                                </option>

                                <option value="Rusak" {{ $barang->kondisi=='Rusak' ? 'selected' : '' }}>
                                    Rusak
                                </option>

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
                                value="{{ old('tanggal_masuk',$barang->tanggal_masuk) }}"
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
                                class="btn btn-warning">

                                <i class="bi bi-save"></i>

                                Update Barang

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection