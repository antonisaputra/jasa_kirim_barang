@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">Tabel User</h5>
    <div class="ms-3 mb-3">
      <a href="/user/tambah" class="btn btn-primary">Tambah User</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table" id="tabel_tujuan">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($user as $row)
          <tr>
            <td>
              {{$loop->iteration}}
            </td>
            <td>{{$row->name}}</td>
            <td>{{$row->role}}</td>
            <td class="d-flex">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/user/edit/{{$row->id}}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                  <a class="dropdown-item" href="/user/delete/{{$row->id}}" onclick="return confirm('Yakin Data User Di Hapus')"><i class="bx bx-trash me-2"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection