<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'nama' => 'required',
            'no_wa' => 'required|numeric',
            'deskripsi' => 'required'
            ]
        );

        $count = Pengaduan::where('no_wa', $request->no_wa)->where('tanggal', date('Y-m-d'))->count();

        if ($count > 0) {
            return redirect()->route('/')->with('message', '<div class="alert alert-danger alert-sm"><i class="fas fa-volume-up"></i> Maaf, Pengaduan anda sedang di proses...</div>');
        } else {
            Pengaduan::create(
                [
                'nama' => $request->nama,
                'no_wa' => $request->no_wa,
                'email' => $request->email,
                'gambar' => $request->gambar,
                'deskripsi' => $request->deskripsi,
                'tanggal' => date('Y-m-d'),
                'ip_addr' => $this->getIPAddress()
                ]
            );

            return redirect()->route('/')->with('message', '<div class="alert alert-success alert-sm"><i class="fas fa-volume-up"></i> Terima Kasih, Pengaduan anda akan kami proses...</div>');
        }
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

    private function getIPAddress()
    {
        //whether ip is from the share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
