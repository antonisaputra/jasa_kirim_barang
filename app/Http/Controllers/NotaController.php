<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Muatan;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    //

    public function index(Tujuan $tujuan)
    {
        $muatan = Muatan::where('id', $tujuan->id_muatan)->first();
        $barang = Barang::where('id_tujuan', $tujuan->id)->get();

        return  view('nota', ['tujuan' => $tujuan, 'muatan' => $muatan, 'barang' => $barang]);
    }
}
