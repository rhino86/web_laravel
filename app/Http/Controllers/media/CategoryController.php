<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// model
use App\Models\Category;

// helper
use Session;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $data['category'] = Category::paginate(5);
        // dd($data['sosmed']->toArray());
        $data['page_title'] = "Halaman Profil";
        return view('media.category', $data);
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
            $user = Category::where(['description' => ucwords($request->description)])->first();
            if ($user === null) {
                $data = [
                    'description' => ucwords($request->description),
                    'slug' => Str::slug($request->description)
                ];
                Category::create($data);
                return redirect()->route('media.category');
            }else{
                Session::put('notif', 'Data Sudah Tersedia');
                return redirect()->route('media.category');
            }
            
        }
    }

    public function getData($slug)
    {
        $data['detail'] = Category::where(['slug' => $slug])->first();
        // dd($data['sosmed']->toArray());
        $data['page_title'] = "Halaman Profil";
        return view('media.category-edit', $data);
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
            $user = Category::where(['description' => ucwords($request->description)])->first();
            if ($user === null) {
                $data = [
                    'description' => ucwords($request->description),
                    'slug' => Str::slug($request->description)
                ];
                Category::find($request->id)->update($data);
                return redirect()->route('media.category');
            } else {
                Session::put('notif', 'Data Tidak Berhasil Diperbaharui');
                return redirect()->back();
            }
            
        }
    }

    public function deleteData(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect()->route('media.category');
    }
}
