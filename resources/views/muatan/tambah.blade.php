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
                        <label for="dbl" class="form-label">DBL</label>
                        <input type="text" class="form-control" id="dbl" name="dbl" aria-describedby="emailHelp">
                        @error('dbl')
                        <small class="text-sm text-danger">DBL {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 me-3">
                        <label for="no_polisi" class="form-label">Truck No Polisi</label>
                        <input type="text" class="form-control" id="no_polisi" name="no_kendaraan" aria-describedby="emailHelp">
                        @error('no_kendaraan')
                        <small class="text-sm text-danger">Truck No Polisi {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="supir" class="form-label">Nama Supir</label>
                        <input type="text" class="form-control" id="supir" name="supir" aria-describedby="emailHelp">
                        @error('supir')
                        <small class="text-sm text-danger">Nama Supir {{$message}}</small>
                        @enderror
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