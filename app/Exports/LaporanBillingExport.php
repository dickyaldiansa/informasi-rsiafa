<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class LaporanBillingExport implements FromCollection, WithHeadings
{
    public function __construct($tanggal_awal, $tanggal_akhir)
    {
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    public function headings(): array
    {
        return ['ID Bill', 'Tanggal Bill', 'ID Reg', 'Rekam Medis', 'Nama Pasien', 'Total Bayar', 'Penjamin', 'Keterangan'];
    }

    public function collection()
    {
        $data = DB::table('billing')
        ->select(
            'id_billing',
            'tanggal_billing',
            'billing.id_reg',
            'pendaftaran.rekam_medis',
            'nama_pasien',
            'total_bayar',
            'nama_penjamin',
            'keterangan_billing'
        )
        ->join('pendaftaran', 'billing.id_reg', '=', 'pendaftaran.id_reg')
        ->join('pasien', 'pendaftaran.rekam_medis', '=', 'pasien.rekam_medis')
        ->join('penjamin', 'pendaftaran.id_penjamin', '=', 'penjamin.id_penjamin')
        ->whereBetween(DB::raw('DATE(tanggal_billing)'), [$this->tanggal_awal, $this->tanggal_akhir])
        ->orderBy('tanggal_billing', 'ASC')
        ->get();

        return $data;
    }
}
