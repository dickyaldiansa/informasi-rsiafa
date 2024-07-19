<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DataObatController extends Controller
{
    public function index(Request $request)
    {
        $nama = $request->nama;
        $select = $request->select;

        $data['data_obat'] = DB::connection('mysql2')
        ->table('databarang')
        ->select(
            'databarang.kode_brng',
            'databarang.nama_brng',
            'kodesatuan.satuan',
            'databarang.letak_barang',
            'databarang.dasar',
            'databarang.h_beli',
            'databarang.ralan',
            'databarang.karyawan',
            'databarang.stokminimal',
            'jenis.nama as nama_jenis',
            'databarang.isi',
            'databarang.kapasitas',
            'databarang.expire',
            'databarang.status',
            'kategori_barang.nama as nama_kategori',
            'golongan_barang.nama as nama_golongan'
        )
        ->join('kodesatuan', 'databarang.kode_sat', '=', 'kodesatuan.kode_sat')
        ->join('jenis', 'databarang.kdjns', '=', 'jenis.kdjns')
        // ->join('industrifarmasi', 'databarang.kode_industri', '=', 'industrifarmasi.kode_industri')
        ->join('kategori_barang', 'databarang.kode_kategori', '=', 'kategori_barang.kode')
        ->join('golongan_barang', 'databarang.kode_golongan', '=', 'golongan_barang.kode')
        ->when(
            $nama,
            function ($query) use ($nama) {
                return $query->where('databarang.nama_brng', 'like',  '%' . $nama . '%');
            }
        )
        ->orderBy('nama_brng', 'ASC')
        ->paginate(10);

        $data['nama'] = $nama;
        $data['select'] = $select;

        return view('data_obat.index', $data);
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
        DB::connection('mysql2')
        ->table('databarang')
        ->where('kode_brng', $id)
        ->update(['status' => $request->status]);

        return redirect('/data_obat')->with('message', 'Sukses Update...');
    }

    public function destroy()
    {
        //
    }

}
