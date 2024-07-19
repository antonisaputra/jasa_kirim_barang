<?php

use App\Models\Muatan;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/laporan/{waktu}', function($waktu){
    
    list($year, $month, $day) = explode('-', $waktu);

    // Mendapatkan data berdasarkan tahun, bulan, dan hari
    $data = Muatan::whereYear('created_at', $year)
                 ->whereMonth('created_at', $month)
                 ->whereDay('created_at', $day)
                 ->get();

    return response()->json($data);
});

Route::get('/laporan_excel/{muatan:id}', function(Muatan $muatan){
    // $tujuan = Tujuan::where('id_muatan', $muatan->id)->get();
    $barang = DB::select('SELECT barangs.id, barangs.status_barang, barangs.jenis_barang, barangs.kuantum, barangs.unit, barangs.jml_berat, barangs.vol, barangs.ongkos, barangs.jumlah_ongkos, tujuans.pengirim, tujuans.penerima, tujuans.no_resi, barangs.status_barang FROM barangs INNER JOIN tujuans ON barangs.id_tujuan=tujuans.id WHERE barangs.id_muatan='.$muatan->id);



    return response()->json(['muatan' => $muatan, 'barang' =>  $barang, 'waktu' => $muatan->created_at->format('d-m-Y')]);
});
