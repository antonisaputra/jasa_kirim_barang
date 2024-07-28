<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>CV Renjani Tirta</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="/assets/js/xlsx.js"></script>
    <link rel="stylesheet" href="/assets/css/nota.css">
</head>

<body>
    @foreach($tujuans as $tujuan)
    <div class="kertas">
        <div class="header d-flex">
            <div class="header-perusahaan d-flex">
                <img src="/assets/img/logo.png" alt="" width="120" srcset="" style="margin-top: 0;">
                <div class="ps-2">
                    <p class="text-uppercase text-14 text-dark">Jasa Angkut Barang</p>
                    <p class="fw-bold text-dark text-18">CV. TRANS DEWI RENJANI</p>
                    <p class="text-12 text-dark">Jln. Kerta Jaya RT. 001/015 No. 52A. Bandengan Utara, Kel. Penjaringan Utara, Jakarta Utara (14440)</p>
                    <div class="d-flex text-12 text-danger">
                        <div>
                            <p style="width: 90px;">ADMIN HP/WA :</p>
                        </div>
                        <div>
                            <p>0877-7714-5352, 0812-8058-7881, 0877-5666-6150</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-cabang-lombok">
                <p class="text-uppercase text-14 text-dark">Cabang <br> Lombok - Sumbawa</p>
                <p class="text-12 text-dark">Jln. Teguh Faisal Depan Pom Bensin Bengkel Turida Mataram</p>
                <div class="d-flex text-12 text-danger">
                    <div>
                        <p style="width: 25px;">HP :</p>
                    </div>
                    <div>
                        <p>0877-7714-5352 <br> 0812-8058-7881 <br> 0877-5666-6150</p>
                    </div>
                </div>
            </div>
            <div class="header-cabang-lombok">
                <p class="text-uppercase text-14 text-dark">Cabang <br> Bali</p>
                <p class="text-12 text-dark">Jln. Teguh Faisal Depan Pom Bensin Bengkel Turida Mataram</p>
                <div class="d-flex text-12 text-danger">
                    <div>
                        <p style="width: 25px;">HP :</p>
                    </div>
                    <div>
                        <p>0877-7714-5352 <br> 0812-8058-7881</p>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-18 fw-bold text-dark text-center text-uppercase mt-1" style="margin-bottom: 2px;">Surat Muatan</p>

        <div class="row" style="padding-left: 10px">
            <div class="col-lg-4 colom text-dark">
                <p class="text-14">No : <span class="text-titik">{{$muatan->dbl}}</span>/<span class="text-titik">{{$tujuan->no_urut}}</span>/<span class="text-titik">{{$tujuan->no_resi}}</span></p>
                <p class="text-14">Truck No Polisi : <span class="text-titik">{{$muatan->no_kendaraan}}</span></p>
            </div>
            <div class="col-lg-4 colom text-dark">
                <p class="text-14">Kepada Yth : <span class="text-titik">{{$tujuan->penerima}}</span></p>
                <p class="text-14">Alamat : <span class="text-titik">{{$tujuan->alamat_penerima}}</span></p>
                <p class="text-14">No. Hp : <span class="text-titik">{{$tujuan->hp_pengirim}}</span></p>
            </div>
            <div class="col-lg-4 colom text-dark">
                <p class="text-14">Pengirim : <span class="text-titik">{{$tujuan->pengirim}}</span></p>
                <p class="text-14">Alamat : <span class="text-titik">{{$tujuan->alamat_pengirim}}</span></p>
                <p class="text-14">No. Hp : <span class="text-titik">{{$tujuan->hp_penerima}}</span></p>
            </div>
        </div>
        <div>
            <table class="table_barang">
                <tr>
                    <th>No</th>
                    <th style="width: 6.8cm;">Jenis Barang</th>
                    <th>Kuantum</th>
                    <th style="width: 2cm;">Unit</th>
                    <th style="width: 2.5cm;">Jml Berat (Kg)</th>
                    <th style="width: 2cm;">Vol</th>
                    <th style="width: 3.2cm;">Ongkos</th>
                    <th style="width: 3.7cm;">Jumlah (Rp)</th>
                </tr>

                <body>
                    @php
                    $no = 0;
                    $total = 0;
                    $barang = DB::select('SELECT * FROM barangs WHERE id_tujuan='.$tujuan->id);
                    @endphp
                    @foreach($barang as $b)
                    @php
                    $no++;
                    $total += $b->jumlah_ongkos;
                    @endphp
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td style="text-align: left;" class="fw-bold">{{$b->jenis_barang}}</td>
                        <td>{{$b->kuantum}}</td>
                        <td>{{$b->unit}}</td>
                        <td>{{$b->jml_berat}}</td>
                        <td>{{$b->vol}}</td>
                        <td style="text-align: left;">Rp. {{number_format($b->ongkos, 0, ',', '.')}}</td>
                        <td style="text-align: left;">Rp. {{number_format($b->jumlah_ongkos, 0, ',', '.')}}</td>
                    </tr>
                    @endforeach

                    @php
                    $kurang_kolom = 6 - $no;
                    @endphp
                    @if($no >= 0)
                    @for($i = 1; $i <= $kurang_kolom; $i++) <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        </tr>
                        @endfor
                        @endif
                </body>
            </table>
            <div class="d-flex justify-content-between">
                <div style="margin-left: 10px;">
                    <p class="text-danger fw-bold text-12 text-uppercase mb-0">Barang Tidak Di Perikas Isinya</p>
                </div>
                <div class="tulisan-total">
                    <p class="text-dark fw-bold text-12 text-uppercase mr-1">Total</p>
                </div>
                <div>
                    <p class="text-dark fw-bold text-12 total me-1">Rp. {{number_format($total, 0, ',', '.')}}</p>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="ttd-penerima mt-3">
                    <p class="text-dark text-12 text-uppercase mb-5">Penerima</p>
                    <p>(......................................)</p>
                </div>
                <div class="peringatan mt-1" style="width: 530px;">
                    <p class="text-decoration-underline text-danger text-12 fw-bold text-right mb-1">PERINGATAN !!</p>
                    <p class="text-danger text-10 fw-bold text-right" style="line-height: 10px;">1. Tidak diberikan untuk kehilangan dan kerugian yang di sebabkan oleh force majeure misalkan kecelakaan, kebakaran, perampokan penjarahan dsb. <br>2. Kerusakan atau kehilangan barang harus disaksikan mandor atau supir, selewatnya dari tanggal penerimaan, bukan tanggung jawab CV. <br>3. Barang-barang cair atau yang bisa pecah, perpackingnya kurang baik/bocor menguap dan lain-lainya adalah diluar tanggunngan CV. <br>4. Barang yang kami terima umum sebagai barang kiriman. <br>5. Perusahaan angkan mengganti kerugian terhadap kerusakan hilang sebesar maksima 10x nominal biaya angkut persatuaanya. <br>6. Komplain tidak dilayani setelah lebih dari penerimaan barang. <br>
                    </p>
                </div>
                <div class="ttd-petugas mt-3">
                    <p class="text-12 text-dark">Jakarta, {{date('d-m-Y')}}</p>
                    <p class="text-dark text-12 text-uppercase mb-5">Petugas</p>
                    <p>(......................................)</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="/assets/src/script.js"></script>

</body>

</html>