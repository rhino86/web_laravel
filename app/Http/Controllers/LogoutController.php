<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function action(Request $request)
    {
        $request->session()->forget('login');
        return redirect()->route('user.login');
    }
}
