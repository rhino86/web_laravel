<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// helper
use Session;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data['page_title'] = "Halaman Dashboard";
        return view('user.dashboard', $data);
    }
}
