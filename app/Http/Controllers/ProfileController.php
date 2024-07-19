<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $data['profile'] = DB::connection('mysql2')
            ->table('dokter')
            ->join('spesialis', 'spesialis.kd_sps', '=', 'dokter.kd_sps')
            ->where('kd_dokter', Auth::user()->username)
            ->first();

        return view('profile.show', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decryptString($id);
        $request->validate(['newpassword'  => 'required']);

        DB::table('users')->where('username', $id)
            ->update(
                [
                'password'  => password_hash($request->newpassword, PASSWORD_DEFAULT),
                'updated_at'  => Carbon::now()->toDateTimeString(),
                ]
            );

        return redirect('profile')->with('message', 'Sukses Change Password !');
    }

    public function destroy($id)
    {
        //
    }
}
