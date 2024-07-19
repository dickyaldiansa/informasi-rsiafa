<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class LaporanPasienExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return ['Rekam Medis', 'No Identitas', 'Nama', 'Jenis Kelamin', 'Golongan Darah', 'Tempat', 'Tanggal Lahir', 'Alamat', 'Kelurahan', 'Kecamatan', 'Kabupaten', 'Provinsi', 'Agama', 'Pekerjaan', 'Status Nikah', 'No BPJS', 'No Telpon', 'Email'];
    }

    public function collection()
    {
        $data = DB::table('pasien')
        ->select(
            'rekam_medis',
            'no_identitas',
            'nama_pasien',
            'jenis_kelamin',
            'golongan_darah',
            'tempat',
            'tanggal_lahir',
            'alamat',
            'kelurahan',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'agama',
            'pekerjaan',
            'status_nikah',
            'no_bpjs',
            'no_telpon',
            'email'
        )
        ->orderBy('rekam_medis', 'ASC')
        ->get();

        return $data;
    }
}
