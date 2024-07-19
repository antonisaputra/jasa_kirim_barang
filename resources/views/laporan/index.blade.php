@extends('partials.main')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Laporan</h5>
        <div class="ms-3 mb-3 col-lg-4 d-flex">
            <label for="waktu"></label>
            <input class="form-control me-2" type="date" id="waktu" placeholder="Default input" aria-label="default input example">
            <div onclick="laporan()" class="btn btn-primary">Cari</div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table" id="table_muatan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>DBL</th>
                        <th>Truck No Polisi</th>
                        <th>Sopir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table_laporan">


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection