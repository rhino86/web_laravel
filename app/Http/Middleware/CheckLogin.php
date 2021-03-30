<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class CheckLogin
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
        // $id = Session::get('login');
        if (!Session::has('login') and Session::get('login')['category'] != 'user') {
            Session::put('notif', 'Akun Tidak Ditemukan');
            return redirect()->route('user.login');
        }
        return $next($request);
        
    }
}
