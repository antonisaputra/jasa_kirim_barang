@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">Tabel Pengiriman No Muatan : {{$muatan->no_muatan}}</h5>
    <div class="ms-3 mb-3">
      <a href="/muatan" class="btn btn-danger   ">Kembali Ke Muatan</a>
      <a href="/tambah_pengiriman/{{$muatan->id}}" class="btn btn-primary">Tambah Pengiriman</a>
      <a href="/notaAll/{{$muatan->id}}" class="btn btn-success">Print Semua</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table" id="tabel_tujuan">
        <thead>
          <tr>
            <th>No</th>
            <th>No Urut</th>
            <th>No Resi</th>
            <th>Pengirim</th>
            <th>Alamat Pengirim</th>
            <th>Penerima</th>
            <th>Alamat Penerima</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($tujuan as $tujuans)
          <tr>
            <td>
              {{$loop->iteration}}
            </td>
            <td>{{$tujuans->no_urut}}</td>
            <td>{{$tujuans->no_resi}}</td>
            <td>{{$tujuans->pengirim}}</td>
            <td>{{$tujuans->alamat_pengirim}}</td>
            <td>{{$tujuans->penerima}}</td>
            <td>{{$tujuans->alamat_penerima}}</td>
            <td class="d-flex">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/edit_pengiriman/{{$tujuans->id}}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                  <a class="dropdown-item" href="/delete_pengiriman/{{$tujuans->id}}" onclick="return confirm('Yakin Data Muatan Di Hapus')"><i class="bx bx-trash me-2"></i> Delete</a>
                </div>
              </div>
              <a href="/barang/{{$tujuans->id}}" class="btn-success btn ms-3"> Lihat Barang</a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection