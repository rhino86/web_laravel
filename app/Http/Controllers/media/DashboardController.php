<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $data['sosmed'] = Category::get();
        // dd($data['sosmed']->toArray());
        $data['page_title'] = "Halaman Profil";
        return view('media.dashboard', $data);
    }
}
