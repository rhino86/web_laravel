<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// model
use App\Models\Kol;
use App\Models\Kolsosmed;
use App\Models\Kolservice;
use App\Models\Province;
use App\Models\Audienscharacter;
use App\Models\Religion;
use App\Models\Koltype;
use App\Models\Category;

// helper
use Session;

class KeyOpinionController extends Controller
{
    //

    public function index()
    {
        
        $data['kol'] = Kol::with(['toKolType', 'toCategory', 'SocialMedia','to_location'])->paginate(20);
        
        // dd($data['kol']->toArray());
        $data['page_title'] = "Halaman Data Key Opinion Leaders";
        return view('media.influencer', $data);
    }
    public function influencer(Type $var = null)
    {
        $data['kol'] = Kol::with(['toKolType', 'toCategory', 'SocialMedia','to_location'])
                        ->where(['koltypes' => 1])
                        ->paginate(20);
        // dd($data['kol']->toArray());
        $data['page_title'] = "Halaman Data Key Opinion Leaders";
        return view('media.influencer', $data);
    }
    public function komunitas()
    {
        $data['kol'] = Kol::with(['toKolType', 'toCategory', 'SocialMedia','to_location'])
                        ->where(['koltypes' => 2])
                        ->paginate(20);
        // dd($data['kol']->toArray());
        $data['page_title'] = "Halaman Data Key Opinion Leaders";
        return view('media.influencer', $data);
    }
    
    public function singlesite()
    {
        $data['kol'] = Kol::with(['toKolType', 'toCategory', 'SocialMedia','to_location'])
                        ->where(['koltypes' => 3])
                        ->paginate(20);
        // dd($data['kol']->toArray());
        $data['page_title'] = "Halaman Data Key Opinion Leaders";
        return view('media.influencer', $data);
    }

    public function getData($username)
    {
        $data['category'] = Category::get();
        $data['type'] = Koltype::get();
        $data['religion'] = Religion::get();
        $data['province'] = Province::get();
        $data['interest'] = Audienscharacter::get();
        $data['page_title'] = "Detail Influencer ".$username;
        $getId = Kol::where(['username' => $username])->first();
        $data['detail'] = Kol::where(['username' => $username])->first();
        $data['socialmedia'] = Kolsosmed::with('toSosmed')->where(['idKol' => $getId->id])->get();
        $data['service'] = Kolservice::with(['joinService', 'socialmedia', 'joinKolSosmed'])->where(['idKol' => $getId->id])->get();
        return view('media.influencer-detail', $data);
    }

    public function updateDetail(Request $request)
    {
        $rules = array(
            'koltype' => 'required',
            'category' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $user = Kol::where(['description' => ucwords($request->description)])->first();
            $data = [
                'koltypes' => $request->koltype,
                'category' => $request->category
            ];
            Kol::find($request->id)->update($data);
            return redirect()->route('media.influencer');
        }
    }
}
