<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LaporanSimrsController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->date)) {
            $date = date('Y-m-d');
        } else {
            $date = $request->date;
        }
        
        $data['laporan_simrs'] = DB::connection('mysql2')
        ->table('reg_periksa')
        ->select(
            'reg_periksa.no_rawat',
            'pasien.no_rkm_medis',
            'pasien.nm_pasien',
            'poliklinik.nm_poli',
            'dokter.nm_dokter',
            'reg_periksa.status_lanjut',
            DB::raw("coalesce(subquery_pemeriksaan_ralan.total_pemeriksaan_ralan, 0) as total_pemeriksaan_ralan"),
            DB::raw("coalesce(subquery_pemeriksaan_ranap.total_pemeriksaan_ranap, 0) as total_pemeriksaan_ranap"),
            DB::raw("coalesce(subquery_diagnosa_ralan.total_diagnosa_ralan, 0) as total_diagnosa_ralan"),
            DB::raw("coalesce(subquery_diagnosa_ranap.total_diagnosa_ranap, 0) as total_diagnosa_ranap"),
            DB::raw("coalesce(subquery_prosedur_ralan.total_prosedur_ralan, 0) as total_prosedur_ralan"),
            DB::raw("coalesce(subquery_prosedur_ranap.total_prosedur_ranap, 0) as total_prosedur_ranap"),
            DB::raw("coalesce(subquery_tindakan_ralan_dokter.total_tindakan_ralan_dokter, 0) as total_tindakan_ralan_dokter"),
            DB::raw("coalesce(subquery_tindakan_ranap_dokter.total_tindakan_ranap_dokter, 0) as total_tindakan_ranap_dokter"),
            DB::raw("coalesce(subquery_resep_obat_ralan.total_resep_obat_ralan, 0) as total_resep_obat_ralan"),
            DB::raw("coalesce(subquery_resep_obat_ranap.total_resep_obat_ranap, 0) as total_resep_obat_ranap")
        )
        ->leftjoin('pasien', 'reg_periksa.no_rkm_medis', '=', 'pasien.no_rkm_medis')
        ->leftjoin('dokter', 'reg_periksa.kd_dokter', '=', 'dokter.kd_dokter')
        ->leftjoin('poliklinik', 'reg_periksa.kd_poli', '=', 'poliklinik.kd_poli')
        // query pemeriksaan ralan
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(pemeriksaan_ralan.no_rawat) as total_pemeriksaan_ralan
                from sik.reg_periksa 
                left join sik.pemeriksaan_ralan 
                on reg_periksa.no_rawat = pemeriksaan_ralan.no_rawat 
                where reg_periksa.tgl_registrasi ='$date'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_pemeriksaan_ralan" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_pemeriksaan_ralan.no_rawat");
            }
        )
        // query pemeriksaan ranap
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(pemeriksaan_ranap.no_rawat) as total_pemeriksaan_ranap
                from sik.reg_periksa 
                left join sik.pemeriksaan_ranap 
                on reg_periksa.no_rawat = pemeriksaan_ranap.no_rawat 
                where reg_periksa.tgl_registrasi ='$date'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_pemeriksaan_ranap" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_pemeriksaan_ranap.no_rawat");
            }
        )
        ->when(
            $date,
            function ($query) use ($date) {
                return $query->where('reg_periksa.tgl_registrasi', $date);
            }
        )
        // query diagnosa ralan
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(diagnosa_pasien.no_rawat) as total_diagnosa_ralan
                from sik.reg_periksa 
                left join sik.diagnosa_pasien 
                on reg_periksa.no_rawat = diagnosa_pasien.no_rawat 
                where reg_periksa.tgl_registrasi ='$date' and 
                diagnosa_pasien.status ='Ralan'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_diagnosa_ralan" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_diagnosa_ralan.no_rawat");
            }
        )
        // query diagnosa ranap
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(diagnosa_pasien.no_rawat) as total_diagnosa_ranap
                from sik.reg_periksa 
                left join sik.diagnosa_pasien 
                on reg_periksa.no_rawat = diagnosa_pasien.no_rawat 
                where reg_periksa.tgl_registrasi ='$date' and 
                diagnosa_pasien.status ='Ranap'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_diagnosa_ranap" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_diagnosa_ranap.no_rawat");
            }
        )
        // query prosedur ralan
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(prosedur_pasien.no_rawat) as total_prosedur_ralan
                from sik.reg_periksa 
                left join sik.prosedur_pasien 
                on reg_periksa.no_rawat = prosedur_pasien.no_rawat 
                where reg_periksa.tgl_registrasi ='$date' and 
                prosedur_pasien.status ='Ralan'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_prosedur_ralan" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_prosedur_ralan.no_rawat");
            }
        )
        // query prosedur ranap
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(prosedur_pasien.no_rawat) as total_prosedur_ranap
                from sik.reg_periksa 
                left join sik.prosedur_pasien 
                on reg_periksa.no_rawat = prosedur_pasien.no_rawat 
                where reg_periksa.tgl_registrasi ='$date' and 
                prosedur_pasien.status ='Ranap'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_prosedur_ranap" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_prosedur_ranap.no_rawat");
            }
        )
        // query tindakan rajal dokter
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(rawat_jl_dr.no_rawat) as total_tindakan_ralan_dokter
                from sik.reg_periksa 
                left join sik.rawat_jl_dr 
                on reg_periksa.no_rawat = rawat_jl_dr.no_rawat 
                where reg_periksa.tgl_registrasi ='$date'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_tindakan_ralan_dokter" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_tindakan_ralan_dokter.no_rawat");
            }
        )
        // query tindakan ranap dokter
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(rawat_inap_dr.no_rawat) as total_tindakan_ranap_dokter
                from sik.reg_periksa 
                left join sik.rawat_inap_dr 
                on reg_periksa.no_rawat = rawat_inap_dr.no_rawat 
                where reg_periksa.tgl_registrasi ='$date'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_tindakan_ranap_dokter" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_tindakan_ranap_dokter.no_rawat");
            }
        )
        // query resep obat ralan
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(resep_obat.no_rawat) as total_resep_obat_ralan
                from sik.reg_periksa 
                left join sik.resep_obat 
                on reg_periksa.no_rawat = resep_obat.no_rawat 
                where reg_periksa.tgl_registrasi ='$date' and 
                resep_obat.status ='ralan'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_resep_obat_ralan" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_resep_obat_ralan.no_rawat");
            }
        )
        // query resep obat ranap
        ->leftJoin(
            DB::raw("(select
                reg_periksa.no_rawat,
                count(resep_obat.no_rawat) as total_resep_obat_ranap
                from sik.reg_periksa 
                left join sik.resep_obat 
                on reg_periksa.no_rawat = resep_obat.no_rawat 
                where reg_periksa.tgl_registrasi ='$date' and 
                resep_obat.status ='ranap'
                group by reg_periksa.no_rawat
                order by reg_periksa.no_rawat) as subquery_resep_obat_ranap" 
            ), function($join) {
                $join->on("reg_periksa.no_rawat", "=", "subquery_resep_obat_ranap.no_rawat");
            }
        )
        ->when(
            $date,
            function ($query) use ($date) {
                return $query->where('reg_periksa.tgl_registrasi', $date);
            }
        )
        ->groupBy('reg_periksa.no_rawat')
        ->orderBy('reg_periksa.no_rawat', 'ASC')
        ->get();

        //dd($queryPemeriksaan);

        $data['date'] = $date;

        return view('laporan_simrs.index', $data);
    }

    public function create()
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

    public function destroy($id)
    {
        //
    }
}
