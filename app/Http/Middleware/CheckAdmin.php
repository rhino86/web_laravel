<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('login') and Session::get('login')['category'] != 'admin') {
            Session::put('notif', 'Akun Tidak Ditemukan');
            return redirect()->route('user.login');
        }
        return $next($request);
    }
}
