@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Tambah Barang Pengirim <span class="text-primary fw-bold">{{ $pengirim->pengirim }}</span> Ke <span class="text-primary fw-bold">{{$pengirim->penerima}}</span> </h5>
        <form action="/tambah_barang/{{$pengirim->id}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="jenis_barang" class="form-label">Jenis Barang</label>
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" aria-describedby="emailHelp" autofocus>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 me-3">
                        <label for="kuatum" class="form-label">Kuantum</label>
                        <input type="number" class="form-control" id="kuatum" name="kuantum" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text" class="form-control" id="unit" name="unit" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 me-3">
                        <label for="jml_berat" class="form-label">Jumlah Berat</label>
                        <input type="text" class="form-control" id="jml_berat" name="jml_berat" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="vol" class="form-label">Volume</label>
                        <input type="text" class="form-control" id="vol" name="vol" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 me-3">
                        <label for="ongkos" class="form-label">Ongkos</label>
                        <input type="number" class="form-control" id="ongkos" name="ongkos" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="jumlah_ongkos" class="form-label">Jumlah Ongkos</label>
                        <input type="number" class="form-control" id="jumlah_ongkos" name="jumlah_ongkos" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <a href="/barang/{{$pengirim->id}}" class="btn btn-danger ms-3 mb-3">Kembali</a>
                <button class="btn btn-primary mb-3 ms-3" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection