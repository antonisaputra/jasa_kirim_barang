@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Tambah Pegiriman No Muatan : {{$muatan->no_muatan}}</h5>
        <form action="/edit_pengiriman/{{$tujuan->id}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="pengirim" class="form-label">Pengirim</label>
                        <input type="text" class="form-control" id="pengirim" value="{{$tujuan->pengirim}}" name="pengirim" aria-describedby="emailHelp" autofocus>
                        @error('pengirim')
                        <small class="text-sm text-danger">Pengirim {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="alamat_pengirim" class="form-label">Alamat Pengirim</label>
                        <input type="text" class="form-control" value="{{$tujuan->alamat_pengirim}}" id="alamat_pengirim" name="alamat_pengirim" aria-describedby="emailHelp">
                        @error('alamat_pengirim')
                        <small class="text-sm text-danger">Alamat Pengirim {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="pengerima" class="form-label">Penerima</label>
                        <input type="text" class="form-control" value="{{$tujuan->penerima}}" id="pengerima" name="penerima" aria-describedby="emailHelp">
                        @error('penerima')
                        <small class="text-sm text-danger">Penerima {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="alamat_penerima" class="form-label">Alamat Penerima</label>
                        <input type="text" class="form-control" value="{{$tujuan->alamat_penerima}}" id="alamat_penerima" name="alamat_penerima" aria-describedby="emailHelp">
                        @error('alamat_penerima')
                        <small class="text-sm text-danger">Alamat Penerima {{$message}}</small>
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