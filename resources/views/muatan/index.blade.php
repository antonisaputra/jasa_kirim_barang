@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">Tabel Muatan</h5>
    <div class="ms-3 mb-3">
      <a href="/tambah_muatan" class="btn btn-primary">Tambah Muatan</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table" id="table_muatan">
        <thead>
          <tr>
            <th>No</th>
            <th>No Muatan</th>
            <th>Truck No Polisi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($muatans as $muatan)
          <tr>
            <td>
              {{$loop->iteration}}
            </td>
            <td>{{$muatan->no_muatan}}</td>
            <td>{{$muatan->no_kendaraan}}</td>
            <td class="d-flex">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/edit_muatan/{{$muatan->id}}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                  <a class="dropdown-item" href="/delete_muatan/{{$muatan->id}}" onclick="return confirm('Yakin Data Muatan Di Hapus')"><i class="bx bx-trash me-2"></i> Delete</a>
                </div>
              </div>
              <a href="/tujuan/{{$muatan->id}}" class="btn-success btn ms-3"> Lihat Pengiriman</a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection