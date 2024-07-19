<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class LaporanObatKeluarExport implements FromCollection, WithHeadings
{
    public function __construct($tanggal_awal, $tanggal_akhir)
    {
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function headings(): array
    {
        return ['ID', 'Tanggal Keluar', 'Nama Obat', 'harga', 'Jumlah Keluar', 'Status Keluar', 'ID Reg', 'Rekam Medis', 'Nama Pasien'];
    }

    public function collection()
    {
        $data = DB::table('obat_keluar')
        ->select(
            'id_obat_keluar',
            'tanggal_keluar',
            'master_obat.nama_obat',
            'harga_obat',
            'jumlah_keluar',
            'status_keluar',
            'obat_keluar.id_reg',
            'pendaftaran.rekam_medis',
            'pasien.nama_pasien'
        )
        ->leftjoin('pendaftaran', 'obat_keluar.id_reg', '=', 'pendaftaran.id_reg')
        ->leftjoin('pasien', 'pendaftaran.rekam_medis', '=', 'pasien.rekam_medis')
        ->join('master_obat', 'obat_keluar.id_master_obat', '=', 'master_obat.id_master_obat')
        ->whereBetween(DB::raw('DATE(tanggal_keluar)'), [$this->tanggal_awal, $this->tanggal_akhir])
        ->orderBy('tanggal_keluar', 'ASC')
        ->get();

        return $data;
    }
}
