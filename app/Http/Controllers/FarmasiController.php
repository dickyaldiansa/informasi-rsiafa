<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FarmasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $select = $request->select;
        
        $data['farmasi'] = DB::connection('mysql2')
            ->table('databarang')
            ->when(
                $search,
                function ($query) use ($search) {
                    return $query->where('kode_brng', 'LIKE', "%{$search}%");
                }
            )
            ->orderBy('nama_brng', 'ASC')
            ->paginate(10);

        $data['search'] = $search;
        $data['select'] = $select;

        return view('farmasi.index', $data);
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
