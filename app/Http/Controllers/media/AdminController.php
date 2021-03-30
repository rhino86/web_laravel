<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

// model
use App\Models\Admin;
use App\Models\Hakakses;

// helper
use Session;

class AdminController extends Controller
{
    //

    public function index()
    {
        $data['admin'] = Admin::with(['ha_join'])->paginate(10);
        $data['hakakses'] = Hakakses::get();
        $data['page_title'] = "Administrator";
        return view('media.admin', $data);
    }

    public function submit(Request $request)
    {
        $rules = array(
            'fullName' => 'required|min:5',
            'username' => 'required|min:5',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $hashed = Hash::make($request->confirm_password);
            $username = str_replace(' ', '', Str::lower($request->username));
            $cek_Kol = Admin::where(['username' => $username])->get();
            if (count($cek_Kol) == 0) {
                $data = [
                    'fullName' => ucwords(Str::lower($request->fullName)),
                    'username' => str_replace(' ','', Str::lower($request->username)),
                    'password' => $hashed,
                    'hakAkses' => $request->hakAkses
                ];

                Admin::create($data);

                return redirect()->back()
                                 ->with(['success' => 'Pendaftaran Berhasil']);

            } else {
                Session::put('notif', 'Akun Sudah Terdaftar');
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function getData($username)
    {
        $data['detail'] = Admin::where(['username' => $username])->first();
        $data['hakakses'] = Hakakses::get();
        $data['page_title'] = "Administrator";
        return view('media.admin-edit', $data);
    }

    public function updateData(Request $request)
    {
        $rules = array(
            'fullName' => 'required|min:5'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $data = [
                'fullName' => ucwords($request->fullName),
                'hakAkses' => $request->hakAkses
            ];
            Admin::find($request->id)->update($data);
            return redirect()->route('media.admin');
        }
    }

    public function getPassword($username)
    {
        $data['detail'] = Admin::where(['username' => $username])->first();
        // $data['hakakses'] = Hakakses::get();
        $data['page_title'] = "Administrator";
        return view('media.admin-password', $data);
    }

    public function updatePasword(Request $request)
    {
        $rules = array(
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $hashed = Hash::make($request->confirm_password);
            $data = [
                'password' => $hashed,
            ];
            Admin::find($request->id)->update($data);
            return redirect()->route('media.admin');
        }
    }

    public function deleteData(Request $request)
    {
        Admin::find($request->id)->delete();
        return redirect()->route('media.admin');
    }
}
