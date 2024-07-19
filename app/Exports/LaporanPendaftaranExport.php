<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class LaporanPendaftaranExport implements FromCollection, WithHeadings
{
    public function __construct($tanggal_awal, $tanggal_akhir)
    {
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function headings(): array
    {
        return ['ID Reg', 'Tanggal Reg', 'Rekam Medis', 'Nama', 'Poliklinik', 'Dokter', 'Penjamin', 'Status Layan', 'Status Bayar'];
    }

    public function collection()
    {
        $data = DB::table('pendaftaran')
        ->select(
            'id_reg',
            'tanggal_reg',
            'pendaftaran.rekam_medis',
            'nama_pasien',
            'nama_poli',
            'nama_dokter',
            'nama_penjamin',
            'status_layan',
            'status_bayar'
        )
        ->join('pasien', 'pendaftaran.rekam_medis', '=', 'pasien.rekam_medis')
        ->join('poliklinik', 'pendaftaran.id_poli', '=', 'poliklinik.id_poli')
        ->join('dokter', 'pendaftaran.id_dokter', '=', 'dokter.id_dokter')
        ->join('penjamin', 'pendaftaran.id_penjamin', '=', 'penjamin.id_penjamin')
        ->whereBetween(DB::raw('DATE(tanggal_reg)'), [$this->tanggal_awal, $this->tanggal_akhir])
        ->orderBy('tanggal_reg', 'ASC')
        ->get();

        return $data;
    }
}
