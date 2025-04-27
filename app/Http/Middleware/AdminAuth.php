<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah session admin_id ada
        if (!Session::has('admin_id')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
