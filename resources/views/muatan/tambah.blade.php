@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Tabel Muatan</h5>
        <form action="/tambah_muatan" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="no_muatan" class="form-label">No Muatan</label>
                        <input type="text" class="form-control" id="no_muatan" name="no_muatan" aria-describedby="emailHelp" autofocus>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 me-3">
                        <label for="no_muatan" class="form-label">Truck No Polisi</label>
                        <input type="text" class="form-control" id="no_muatan" name="no_kendaraan" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <a href="/muatan" class="btn btn-danger ms-3 mb-3">Kembali</a>
                <button class="btn btn-primary mb-3 ms-3" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection