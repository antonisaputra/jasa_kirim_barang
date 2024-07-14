<?php

namespace App\Http\Controllers;

use App\Models\Muatan;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class TujuanController extends Controller
{
    //
    public function index(Muatan $muatan){
        $tujuan = Tujuan::where('id_muatan', $muatan->id)->latest()->get();
        return view('/tujuan.index',['tujuan' =>  $tujuan, 'muatan' => $muatan]);
    }

    public function view_tambah_pengiriman(Muatan $muatan){
        return view('tujuan.tambah_pengiriman', ['muatan' => $muatan]);
    }

    public function aksi_tambah_pengiriman(Muatan $muatan, Request $request){
        $data['id_muatan'] = $muatan->id;
        $data['pengirim'] = $request->pengirim;
        $data['alamat_pengirim'] = $request->alamat_pengirim;
        $data['penerima'] = $request->penerima;
        $data['alamat_penerima'] = $request->alamat_penerima;

        Tujuan::create($data);
        return redirect('/tujuan/'.$muatan->id);
    }

    public function view_edit_pengiriman(Tujuan $tujuan){
        $muatan = Muatan::where('id', $tujuan->id_muatan)->first();
        return view('tujuan.edit_pengiriman',['tujuan' => $tujuan, 'muatan' =>  $muatan]);
    }

    public function aksi_edit_pengiriman(Tujuan $tujuan, Request $request){
        $muatan = Muatan::where('id', $tujuan->id_muatan)->first();
        $data['pengirim'] = $request->pengirim;
        $data['alamat_pengirim'] = $request->alamat_pengirim;
        $data['penerima'] = $request->penerima;
        $data['alamat_penerima'] = $request->alamat_penerima;

        Tujuan::where('id', $tujuan->id)->update($data);
        return redirect('/tujuan/'.$muatan->id);
    }

    public function delete_pengiriman(Tujuan $tujuan){
        Tujuan::destroy('id', $tujuan->id);

        return redirect()->back();
    }
}
