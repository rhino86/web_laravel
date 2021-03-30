<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// model
use App\Models\Audienscharacter;

// helper
use Session;

class AudienscharacterController extends Controller
{
    //
    public function index()
    {
        $data['audiens'] = Audienscharacter::paginate(5);
        // dd($data['sosmed']->toArray());
        $data['page_title'] = "Halaman Audiens Character";
        return view('media.audiens-list', $data);
    }

    public function submit(Request $request)
    {
        $rules = array(
            'description' => 'required|min:4'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $user = Audienscharacter::where(['description' => ucwords($request->description)])->first();
            if ($user === null) {
                $data = [
                    'description' => ucwords($request->description),
                    'slug' => Str::slug($request->description)
                ];
                Audienscharacter::create($data);
                return redirect()->route('media.audiens');
            } else {
                Session::put('notif', 'Data Sudah Tersedia');
                return redirect()->route('media.audiens');
            }
        }
    }

    public function getData($slug)
    {
        $data['detail'] = Audienscharacter::find($slug);
        // dd($data['sosmed']->toArray());
        $data['page_title'] = "Halaman Audiens Character";
        return view('media.audiens-edit', $data);
    }

    public function update(Request $request)
    {
        $rules = array(
            'description' => 'required|min:4'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $user = Audienscharacter::where(['description' => ucwords($request->description)])->first();
            if ($user === null) {
                $data = [
                    'description' => ucwords($request->description),
                    'slug' => Str::slug($request->description)
                ];
                Audienscharacter::find($request->id)->update($data);
                return redirect()->route('media.audiens');
            } else {
                Session::put('notif', 'Data Tidak Berhasil Diperbaharui');
                return redirect()->back();
            }
        }
    }

    public function deleteData(Request $request)
    {
        Audienscharacter::find($request->id)->delete();
        return redirect()->route('media.audiens');
    }
}
