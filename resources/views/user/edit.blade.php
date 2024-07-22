@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Edit User</h5>
        <form action="/user/edit/{{$user->id}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" aria-describedby="emailHelp" autofocus>
                        @error('name')
                        <small class="text-sm text-danger">Username {{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="role" class="form-label">role</label>
                        <select class="form-select" id="role" name="role" aria-label="Default select example">
                            <option value="karyawan">Karyawan</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <a href="/user" class="btn btn-danger ms-3 mb-3">Kembali</a>
                <button class="btn btn-primary mb-3 ms-3" type="submit">Simpan</button>
                <a href="/user/password/{{$user->id}}" class="btn btn-info ms-3 mb-3">Ubah Password</a>
            </div>
        </form>
    </div>
</div>
@endsection