<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

/* model */
use App\Models\Kol;
use App\Models\Admin;

// library
use Session;
use Form;
use Storage;

class UserLoginController extends Controller
{
    //

    public function index()
    {
        
        $data['page_title'] = "Halaman Profil";
        return view('user-auth.login', $data);
    }

    public function auth(Request $request)
    {
        $rules = array(
            
            'email' => 'required',
            'password' => 'required|min:8'
        );

        $validator = Validator::make($request->all(), $rules);
        $hashed = Hash::make($request->password);

        if ($validator->fails()) {
            $messages = $validator->errors();

            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $data = Kol::where(['email' => $request->email])->first();
            $admin = Admin::where(['username' => $request->email])->first();

            if ($data) {
                if (Hash::check($request->password, $data->password)) {
                    $ses_login = array(
                        'id' => $data->id,
                        'name' => $data->name,
                        'logged_in' => true,
                        'category' => 'user'
                    );
                    Session::put('login', $ses_login);
                    return redirect()->route('user.dashboard');
                } else {
                    Session::put('notif', 'Akun Tidak Ditemukan');
                    return redirect()->back()
                        ->with(['error' => 'Login Gagal']);
                }
            } elseif ($admin) {
                if (Hash::check($request->password, $admin->password)) {
                    $ses_login = array(
                        'id' => $admin->id,
                        'name' => $admin->name,
                        'fullName' => $admin->fullName,
                        'logged_in' => true,
                        'category' => 'admin'
                    );
                    Session::put('login', $ses_login);
                    return redirect()->route('media.dashboard');
                } else {
                    Session::put('notif', 'Akun Tidak Ditemukan');
                    return redirect()->back()
                        ->with(['error' => 'Login Gagal']);
                }
            } else {
                Session::put('notif', 'Akun Tidak Ditemukan');
                return redirect()->back()->with('error', 'Akun Tidak ditemukan');
            }
        }
    }

    public function register()
    {
        $data['page_title'] = "Halaman Profil";
        return view('user-auth.register', $data);
    }

    public function registrasi(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'username' => 'required|min:5',
            'email' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $hashed = Hash::make($request->password_confirmation);
            $cek_Kol = Kol::where(['email' => $request->email])->get();
            if (count($cek_Kol) == 0) {
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => $hashed,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                Kol::create($data);
                $data = Kol::where(['email' => $request->email])->first();
                if ($data) {
                    if (Hash::check($request->password, $data->password)) {
                        $ses_login = array(
                            'id' => $data->id,
                            'name' => $data->name,
                            'logged_in' => true,
                            'category' => 'user'
                        );
                        Session::put('login', $ses_login);
                        return redirect()->route('user.dashboard');
                    } else {
                        Session::put('notif', 'Akun Tidak Ditemukan');
                        return redirect()->back()
                            ->with(['error' => 'Login Gagal']);
                    }
                } else {
                    Session::put('notif', 'Akun Tidak Ditemukan');
                    return redirect()->back()->with('error', 'Akun Tidak ditemukan');
                }
            
                // return redirect()->back()
                //                  ->with(['success' => 'Pendaftaran Berhasil']);
                
            } else {
                Session::put('notif', 'Akun Sudah Terdaftar');
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }
}
