@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">Deskripsi Pengiriman</h5>
    @foreach($tujuanMuatan as $TM)
    <div class="row mx-3">
      <div class="col-lg-6">
        <h5>Muatan</h5>
        <p>No Muatan: <span class="text-primary fw-bold">{{$TM->no_muatan}}</span></p>
        <p>No Kendaraan : <span class="text-primary fw-bold">{{$TM->no_kendaraan}}</span></p>
      </div>
      <div class="col-lg-6">
        <h5>Pengiriman</h5>
        <p>Pengirim : <span class="text-primary fw-bold">{{$TM->pengirim}}</span></p>
        <p>Alamat Pengirim : <span class="text-primary fw-bold">{{$TM->alamat_pengirim}}</span></p>
        <p>Penerima : <span class="text-primary fw-bold">{{$TM->penerima}}</span></p>
        <p>Alamat Penerima : <span class="text-primary fw-bold">{{$TM->alamat_penerima}}</span></p>
      </div>
    </div>
    @endforeach

    <div class="ms-3">
      <a href="/tujuan/{{$tujuan->id_muatan}}" class="btn btn-danger">Kembali Ke Pengiriman</a>
      <a href="/tambah_barang/{{$tujuan->id}}" class="btn btn-primary">Tambah Barang</a>
      <a href="/tambah_barang/{{$tujuan->id}}" class="btn btn-success">Print</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table" id="tabel_barang">
        <thead>
          <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Kuantum</th>
            <th>Unit</th>
            <th>Jumlah Berat</th>
            <th>Volume</th>
            <th>Ongkos</th>
            <th>Jumlah Ongkos</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @php
            $total = 0;
          @endphp
          @foreach($barang as $b)
          @php
            $total += $b->jumlah_ongkos
          @endphp
          <tr>
            <td>
              {{$loop->iteration}}
            </td>
            <td>{{$b->jenis_barang}}</td>
            <td>{{$b->kuantum}}</td>
            <td>{{$b->unit}}</td>
            <td>{{$b->jml_berat}}</td>
            <td>{{$b->vol}}</td>
            <td>Rp. {{number_format($b->ongkos, 0, ',', '.')}}</td>
            <td>Rp. {{number_format($b->jumlah_ongkos, 0, ',', '.')}}</td>
            <td class="d-flex">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/edit_barang/{{$b->id}}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                  <a class="dropdown-item" href="/hapus_barang/{{$b->id}}"><i class="bx bx-trash me-2"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
          <tr>
            <td colspan="7" class="fw-bold">Sub Total</td>
            <td colspan="1" class="fw-bold text-primary">Rp. {{number_format($total, 0, ',', '.')}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection