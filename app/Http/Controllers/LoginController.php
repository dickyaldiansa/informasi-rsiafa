<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            return redirect('/dashboard');
        } else {
            return view('login.form');
        }
    }

    public function authenticate(Request $request)
    {
        $request->validate(['username' => 'required', 'password' => 'required']);

        if (request()->getMethod() == 'POST') {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            }

            return back()->withErrors(
                [
                'errorlogin' => 'The provided credentials do not match our records.',
                ]
            );
        }
    }
}
