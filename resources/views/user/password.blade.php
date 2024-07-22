@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Edit Password {{$user->name}}</h5>
        <form action="/user/password/{{$user->id}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3 ms-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                        @error('password')
                        <small class="text-sm text-danger">Password {{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <a href="/user" class="btn btn-danger ms-3 mb-3">Kembali</a>
                <button class="btn btn-primary mb-3 ms-3" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection