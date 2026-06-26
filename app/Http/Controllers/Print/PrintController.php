<?php

namespace App\Http\Controllers\Print;

use App\Models\AnggotaUKM;
use App\Models\Mahasiswa;
use App\Models\UKM;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PrintController extends Controller
{
    public function mahasiswa()
    {
        $data = Mahasiswa::all();
        return view('print.mahasiswa', compact('data'));
    }

    public function ukm()
    {
        $data = UKM::all();
        return view('print.ukm', compact('data'));
    }

    public function anggota()
    {
        $data = AnggotaUKM::with(['mahasiswa', 'ukm'])->get();
        return view('print.anggota', compact('data'));
    }

    public function anggotaByUKM(UKM $ukm)
    {
        $data = AnggotaUKM::with(['mahasiswa'])->where('u_k_m_id', $ukm->id)->get();
        return view('print.anggota', compact('data'))->with('ukm', $ukm);
    }
}
