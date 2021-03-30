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
use App\Models\Socialmediatype;
use App\Models\Servicetype;
use App\Models\Province;
use App\Models\Audienscharacter;
use App\Models\Religion;
use App\Models\Koltype;
use App\Models\Category;
use App\Models\Project;
use App\Models\Mediarekomendation;
use App\Models\Mediarekomendationkol;
// helper 
use Session;

class RekomendasiController extends Controller
{
    public function __construct()
    {
        if (!Session::has('rek_kol')) {
            Session::put('rek_kol', []);
        }
    }

    public function index()
    {
        // Session::put('rek_kol', []);
        
        $data['audience_character'] = Audienscharacter::get();
        $data['category'] = Category::get();
        $data['province'] = Province::get();
        $data['servicetype'] = Servicetype::get();
        $data['socialmediatype'] = Socialmediatype::get();
        $data['kol'] = Kol::with(['toKolType', 'toCategory','SocialMedia', 'to_location'])->whereHas('to_location')->paginate(20);
        $data['page_title'] = "Halaman Data Key Opinion Leaders";
        return view('media.rekomendasi-step-1', $data);
    }

    public function filter(Request $request)
    {
        // dd($request->audiens);
        $getKol = Kol::with(['toKolType', 'toCategory', 'SocialMedia', 'to_location'])->orderBy('id')->latest();
        if ($request->audiens) {
            foreach ($request->audiens as $key => $value) {
                if ($key == 0) {
                    $getKol = $getKol->where('audience_character', 'like', '%' . $value . '%');
                } else {
                    $getKol = $getKol->orWhere('audience_character', 'like', '%' . $value . '%');
                }
                
            }
        }

        if ($request->category) {
            foreach ($request->category as $key => $value) {
                if ($key == 0) {
                    $getKol = $getKol->where('category', $value);
                } else {
                    $getKol = $getKol->orWhere('category', $value);
                }
                
            }
        }

        if ($request->location) {
            $getKol = $getKol->where('location',  $request->location);
        }
        
        if ($request->socialmedia) {
            foreach ($request->socialmedia as $key => $value) {
                if ($key == 0) {
                    $getKol = $getKol->whereHas('SocialMedia', function ($q) use ($value) {
                        $q->where('sosmedtype', $value);
                    });
                }else {
                    $getKol = $getKol->whereHas('SocialMedia', function($q) use ($value){
                        $q->orWhere('sosmedtype', $value);
                    });
                }
            }
        }
        if ($request->price) {
            $price = $request->price;
            $getKol = $getKol->whereHas('services', function ($q) use ($price) {
                $q->where('price', '<=', $price);
            });
        }

        if ($request->min_follower) {
                $getKol = $getKol->where('follower', '>=', $request->min_follower);
        }
        if ($request->max_follower) {
                $getKol = $getKol->where('follower', '<=', $request->max_follower);
        }
        $getKol = $getKol->orderBy('follower', 'asc');
        $data['audience_character'] = Audienscharacter::get();
        $data['category'] = Category::get();
        $data['province'] = Province::get();
        $data['servicetype'] = Servicetype::get();
        $data['socialmediatype'] = Socialmediatype::get();
        $data['kol'] = $getKol->paginate(10);
        // dd($data['kol']->toArray());
        $data['page_title'] = "Halaman Data Key Opinion Leaders";
        return view('media.rekomendasi-step-1', $data);
    }

    public function postSession(Request $request)
    {
        $rekomendasi = Session::get('rek_kol');
        $rekomendasi[$request->id] = $request->id;
        Session::put('rek_kol', $rekomendasi);
        $jml = count(Session::get('rek_kol'));
        echo $jml;
        
    }
    public function delSession(Request $request)
    {
        Session::forget('rek_kol' . '.' . $request->id);
        $jml = count(Session::get('rek_kol'));
        echo $jml;
    }

    public function getData($username)
    {
        $data['category'] = Category::get();
        $data['type'] = Koltype::get();
        $data['religion'] = Religion::get();
        $data['province'] = Province::get();
        $data['interest'] = Audienscharacter::get();
        $data['page_title'] = "Detail Influencer " . $username;
        $getId = Kol::where(['username' => $username])->first();
        $data['detail'] = Kol::where(['username' => $username])->first();
        $data['socialmedia'] = Kolsosmed::with('toSosmed')->where(['idKol' => $getId->id])->get();
        $data['service'] = Kolservice::with(['joinService', 'socialmedia', 'joinKolSosmed'])->where(['idKol' => $getId->id])->get();
        return view('media.rek-influencer-detail', $data);
    }

    public function preview()
    {
        $getKol = Kol::with(['toKolType', 'toCategory', 'SocialMedia', 'to_location'])->latest();
        foreach (Session::get('rek_kol') as $key => $value) {
            $getKol = $getKol->orWhere('id',$value);
        }
        // $getKol = $getKol->get();
        $data['rekomend'] = $getKol->get();
        $data['project']  = Project::get();
        $data['page_title'] = "Rekomendasi Media";
        return view('media.rekomendasi-step-2', $data);
    }

    public function getProject(Request $request)
    {
        $getProject = Project::where(['id' => $request->id])->first();
        echo json_encode($getProject);
    }

    public function submitRekomendasi(Request $request)
    {
        $rand = Str::random(20);
        $data = [
            'code' => $rand,
            'idProject' => $request->idProject
        ];
        Mediarekomendation::create($data);
        for ($i=0; $i < count($_POST['idKol']) ; $i++) { 
            $dataKol = [
                'code' => $rand,
                'idKol' => $_POST['idKol'][$i]
            ];
            Mediarekomendationkol::create($dataKol);
        }
        Session::put('rek_kol', []);
        return redirect()->route('media.rekomendasi.history');
    }

    public function history()
    {
        $data['riwayat'] = Mediarekomendation::with(['withProject', 'withRekKol'])->paginate(10);
        // dd($data['riwayat']->toArray());
        $data['project']  = Project::get();
        $data['page_title'] = "Riwayat Media Rekomendasi";
        return view('media.rekomendasi-riwayat', $data);
    }

    public function detail($code)
    {
        $data['riwayat'] = Mediarekomendationkol::with(['withKol'=> function($q){ $q->with(['toKolType', 'to_location', 'SocialMedia'])->get();}])->where(['code' => $code])->paginate(10);
        // dd($data['riwayat']->toArray());
        $data['project']  = Project::get();
        $data['page_title'] = "Riwayat Media Rekomendasi";
        return view('media.rekomendasi-riwayat-detail', $data);
    }
}
