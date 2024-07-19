<?php

namespace App\Http\Controllers;

use App\Models\Muatan;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    //

    public function index(){
        $muatans = Muatan::latest()->get();
        return view('muatan.index', ['muatans' => $muatans]);
    }

    public function tambah_muatan(){
        return view('muatan.tambah');
    }

    public function aksi_tambah_muatan(Request $request){
        $data = $request->validate([
            'no_kendaraan' => 'required',
            'supir' => 'required',
            'dbl' => 'required'
        ]);
        Muatan::create($data);

        return redirect('muatan');
    }

    public function edit_muatan(Muatan $muatan){
        
        return view('muatan.edit_muatan',['muatan' => $muatan]);
    }

    public function aksi_edit_muatan(Muatan $muatan, Request $request){
        $data = $request->validate([
            'no_kendaraan' => 'required',
            'supir' => 'required',
            'dbl' => 'required'
        ]);
        Muatan::where('id', $muatan->id)->update($data);

        return redirect('/muatan');
    }

    public function delete_muatan(Muatan $muatan){
        Muatan::destroy('id', $muatan->id);
        return redirect()->back();
    }
}
