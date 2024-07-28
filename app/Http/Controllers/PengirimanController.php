<?php

namespace App\Http\Controllers;

use App\Models\Muatan;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class PengirimanController extends Controller
{
    //

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Muatan::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function($row) {
                    return Carbon::parse($row->created_at)->format('d M Y H:i:s');
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
              <div class="dropdown d-flex">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/edit_muatan/'.$row->id.'"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                  <a class="dropdown-item" href="/delete_muatan/'.$row->id.'" onclick="return confirm("Yakin Data Muatan Di Hapus")"><i class="bx bx-trash me-2"></i> Delete</a>
                </div>
                <a href="/tujuan/'.$row->id.'" class="btn-secondary btn ms-3"> Lihat Pengiriman</a>
              </div>
              ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $muatans = Muatan::latest()->get();
        return view('muatan.index', ['muatans' => $muatans]);
    }

    public function tambah_muatan()
    {
        return view('muatan.tambah');
    }

    public function aksi_tambah_muatan(Request $request)
    {
        $data = $request->validate([
            'no_kendaraan' => 'required',
            'supir' => 'required',
            'dbl' => 'required'
        ]);

        $data['id_user'] = auth()->user()->id;

        Muatan::create($data);

        return redirect('muatan');
    }

    public function edit_muatan(Muatan $muatan)
    {

        return view('muatan.edit_muatan', ['muatan' => $muatan]);
    }

    public function aksi_edit_muatan(Muatan $muatan, Request $request)
    {
        $data = $request->validate([
            'no_kendaraan' => 'required',
            'supir' => 'required',
            'dbl' => 'required'
        ]);
        Muatan::where('id', $muatan->id)->update($data);

        return redirect('/muatan');
    }

    public function delete_muatan(Muatan $muatan)
    {
        Muatan::destroy('id', $muatan->id);
        return redirect()->back();
    }
}
