@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Tambah Pegiriman No Muatan : {{$muatan->no_muatan}}</h5>
        <form action="/tambah_pengiriman/{{$muatan->id}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="pengirim" class="form-label">Pengirim</label>
                        <input type="text" class="form-control" id="pengirim" name="pengirim" aria-describedby="emailHelp" autofocus>
                        @error('pengirim')
                        <small class="text-sm text-danger">Pengirim {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
                        <input type="text" class="form-control" id="alamat_pengirim" name="alamat_pengirim" aria-describedby="emailHelp">
                        @error('alamat_pengirim')
                        <small class="text-sm text-danger">Alamat Pengirim {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="hp_pengirim" class="form-label">No HP Pengirim</label>
                        <input type="text" class="form-control" id="hp_pengirim" name="hp_pengirim" aria-describedby="emailHelp">
                        @error('hp_pengirim')
                        <small class="text-sm text-danger">Nomor HP Pengirim {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="penerima" class="form-label">Penerima</label>
                        <input type="text" class="form-control" id="penerima" name="penerima" aria-describedby="emailHelp">
                        @error('penerima')
                        <small class="text-sm text-danger">Penerima {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="alamat_penerima" class="form-label">Alamat Penerima</label>
                        <input type="text" class="form-control" id="alamat_penerima" name="alamat_penerima" aria-describedby="emailHelp">
                        @error('alamat_penerima')
                        <small class="text-sm text-danger">Alamat Penerima {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="hp_penerima" class="form-label">No HP Penerima</label>
                        <input type="text" class="form-control" id="hp_penerima" name="hp_penerima" aria-describedby="emailHelp">
                        @error('hp_penerima')
                        <small class="text-sm text-danger">Nomor HP Penerima {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="no_resi" class="form-label">Nomor Resi</label>
                        <input type="text" class="form-control" id="no_resi" name="no_resi" aria-describedby="emailHelp" autofocus>
                        @error('no_resi')
                        <small class="text-sm text-danger">Nomor Resi {{$message}}</small>
                        @enderror
                    </div>
                </div>
                
            </div>
            <div class="d-flex">
                <a href="/tujuan/{{$muatan->id}}" class="btn btn-danger ms-3 mb-3">Kembali</a>
                <button class="btn btn-primary mb-3 ms-3" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection