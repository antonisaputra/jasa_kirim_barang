<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    //

    

    public function index(Tujuan $tujuan){
        $barang = Barang::where('id_tujuan', $tujuan->id)->get();
        $tujuanMuatan = DB::select('SELECT tujuans.id, muatans.dbl, muatans.supir, muatans.no_kendaraan, tujuans.pengirim, tujuans.id_muatan, tujuans.alamat_pengirim, tujuans.penerima, tujuans.alamat_penerima, tujuans.no_resi FROM tujuans INNER JOIN muatans ON tujuans.id_muatan=muatans.id WHERE tujuans.id='.$tujuan->id);
        return view('barang.index', ['barang' =>  $barang, 'tujuanMuatan'=> $tujuanMuatan, 'tujuan' => $tujuan]);
    }

    public function tambah_barang(Tujuan $tujuan){
        
        return view('barang.tambah_barang', ['pengirim' => $tujuan]);
    }

    public function aksi_tambah_barang(Tujuan $tujuan, Request $request){


        Barang::create([
            'id_muatan' => $tujuan->id_muatan,
            'id_tujuan' => $tujuan->id,
            'status_barang' => $request->status_barang,
            'jenis_barang' => $request->jenis_barang,
            'kuantum' => $request->kuantum,
            'unit' => $request->unit,
            'jml_berat' => $request->jml_berat,
            'vol' => $request->vol,
            'ongkos' => $request->ongkos,
            'jumlah_ongkos' => $request->jumlah_ongkos,
        ]);

        return redirect('/barang/'.$tujuan->id);
    }

    public function edit_barang(Barang  $barang){
        $pengirim = Tujuan::where('id', $barang->id_tujuan)->first();
        return view('barang.edit_barang', ['barang' => $barang, 'pengirim' =>  $pengirim]);
    }

    public function aksi_edit_barang(Barang $barang, Request $request){
        Barang::where('id', $barang->id)->update([
            'jenis_barang' => $request->jenis_barang,
            'kuantum' => $request->kuantum,
            'unit' => $request->unit,
            'jml_berat' => $request->jml_berat,
            'vol' => $request->vol,
            'ongkos' => $request->ongkos,
            'jumlah_ongkos' => $request->jumlah_ongkos,
        ]);

        return redirect('/barang/'.$barang->id_tujuan);
    }

    public function hapus_barang(Barang $barang){
        Barang::destroy('id_barang', $barang->id);
        return redirect()->back();
    }
}
