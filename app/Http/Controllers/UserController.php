<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $select = $request->select;

        $data['user'] = DB::table('users')
            ->when(
                $search,
                function ($query) use ($search) {
                    return $query->where('name', 'LIKE', "%{$search}%");
                }
            )
        ->orderBy('username', 'ASC')
        ->paginate(10);

        $data['search'] = $search;
        $data['select'] = $select;

        return view('user.index', $data);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'nama'      => 'required',
            'username'  => 'required',
            'email'     => 'required|email',
            'password'  => 'required'
            ]
        );

        $cekuser = DB::table('users')
            ->where('username', $request->username)
            ->count();

        if ($cekuser > 0) {
            return redirect('user')->with('message', 'Username sudah ada.');
        } else {
            DB::table('users')->insert(
                [
                'name'      => $request->nama,
                'email'     => $request->email,
                'username'  => $request->username,
                'password'  => password_hash($request->password, PASSWORD_DEFAULT),
                'created_at' => Carbon::now()
                ]
            );

            return redirect('user')->with('message', 'Success Create User.');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['user'] = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
            'nama'  => 'required',
            'email' => 'required|email',
            ]
        );

        if ($request->password == '') {
            $query = [
                'name'  => $request->nama,
                'email' => $request->email,
                'updated_at' => Carbon::now()
            ];
        } else {
            $query = [
                'name'      => $request->nama,
                'email'     => $request->email,
                'password'  => password_hash($request->password, PASSWORD_DEFAULT),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('users')->where('id', $id)->update($query);

        return redirect('user')->with('message', 'Sukses Update Data !');
    }

    public function destroy($id)
    {
        //
    }
}
