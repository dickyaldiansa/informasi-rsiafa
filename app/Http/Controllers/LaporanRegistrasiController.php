<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LaporanRegistrasiController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->tanggal)) {
            $tanggal = date('Y-m-d');
        } else {
            $tanggal = $request->tanggal;
        }

        $data['registrasi'] = DB::connection('mysql2')
        ->table('reg_periksa')
        ->join('pasien', 'pasien.no_rkm_medis', '=', 'reg_periksa.no_rkm_medis')
        ->join('penjab', 'penjab.kd_pj', '=', 'reg_periksa.kd_pj')
        ->join('dokter', 'dokter.kd_dokter', '=', 'reg_periksa.kd_dokter')
        ->join('poliklinik', 'poliklinik.kd_poli', '=', 'reg_periksa.kd_poli')
        ->when(
            $tanggal,
            function ($query) use ($tanggal) {
                return $query->where('reg_periksa.tgl_registrasi', $tanggal);
            }
        )
        ->orderBy('no_rawat', 'DESC')
        ->get();

        $data['tanggal'] = $tanggal;

        return view('registrasi.index', $data);
    }

    public function create($id)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy()
    {
        //
    }

}