<?php

namespace App\Http\Controllers;

use App\Models\Muatan;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class TujuanController extends Controller
{
    
    public function formatNumberZero($number) {
        return str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    public function index(Muatan $muatan)
    {
        $tujuan = Tujuan::where('id_muatan', $muatan->id)->latest()->get();
        return view('/tujuan.index', ['tujuan' =>  $tujuan, 'muatan' => $muatan]);
    }

    public function view_tambah_pengiriman(Muatan $muatan)
    {
        return view('tujuan.tambah_pengiriman', ['muatan' => $muatan]);
    }

    public function aksi_tambah_pengiriman(Muatan $muatan, Request $request)
    {
        $data = $request->validate([
            'no_resi' => 'required',
            'pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'hp_pengirim' => 'required',
            'hp_penerima' => 'required',
            'penerima' => 'required',
            'alamat_penerima' => 'required',
        ]);

        $cariBarang = Tujuan::where('id_muatan', $muatan->id)->latest()->first();

        if ($cariBarang) {
            $no_urut = intval($cariBarang->no_urut);
            $tambahNoUrut = $this->formatNumberZero($no_urut + 1);
            $data['no_urut'] = $tambahNoUrut;
        } else {
            $data['no_urut'] = "001";
        }

        $data['id_muatan'] = $muatan->id;

        Tujuan::create($data);

        return redirect('/tujuan/' . $muatan->id);
    }

    public function view_edit_pengiriman(Tujuan $tujuan)
    {
        $muatan = Muatan::where('id', $tujuan->id_muatan)->first();
        return view('tujuan.edit_pengiriman', ['tujuan' => $tujuan, 'muatan' =>  $muatan]);
    }

    public function aksi_edit_pengiriman(Tujuan $tujuan, Request $request)
    {
        $muatan = Muatan::where('id', $tujuan->id_muatan)->first();

        $data = $request->validate([
            'no_resi' => 'required',
            'pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'hp_pengirim' => 'required',
            'hp_penerima' => 'required',
            'penerima' => 'required',
            'alamat_penerima' => 'required',
        ]);

        Tujuan::where('id', $tujuan->id)->update($data);
        return redirect('/tujuan/' . $muatan->id);
    }

    public function delete_pengiriman(Tujuan $tujuan)
    {
        Tujuan::destroy('id', $tujuan->id);

        return redirect()->back();
    }
}
