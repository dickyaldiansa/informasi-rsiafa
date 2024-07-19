<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Farmasi
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->username == 'farmasi') {
            return $next($request);
        }

        return abort(401);
    }
}
