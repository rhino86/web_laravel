<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// model
use App\Models\Kol;
use App\Models\Kolservice;
use App\Models\Kolsosmed;
use App\Models\Socialmediatype;
use App\Models\Servicetype;

// helper
use Session;

class ServiceController extends Controller
{
    public function index()
    {
        $data['service'] = Kolservice::with(['socialmedia', 'joinKols', 'joinService', 'joinKolSosmed'])
                                     ->where(['idKol' => Session::get('login')['id']])->get();
        // dd($data['service']->toArray());
        $data['page_title'] = "Halaman Profil";
        return view('user.service-list', $data);
    }

    public function addService()
    {
        $data['sosmed'] = Socialmediatype::get();
        // dd($data['sosmed']->toArray());
        $data['page_title'] = "Halaman Profil";
        return view('user.service-add', $data);
    }

    public function getSosmed(Request $request)
    {
        $kolsosmed = Kolsosmed::where(['sosmedtype' => $request->id,'idKol' => Session::get('login')['id']])->get();
        $htmlKol = '';
        foreach ($kolsosmed as $key => $value) {
            $htmlKol .= '<option value="'.$value->id.'">'.$value->username.'</option>';
        }
        $htmlService = '';
        $servicetype = Servicetype::where(['sosmedtype' => $request->id])->get();
        foreach ($servicetype as $key => $value) {
            $htmlService .= '<option value="' . $value->id . '">' . $value->description . '</option>';
        }

        $merger = implode('_', array($htmlKol, $htmlService));
        echo json_encode($merger);
        
    }

    public function addSosmed(Request $request)
    {
        
        $rules = array(
            'platform' => 'required',
            'service' => 'required',
            'akun' => 'required',
            'price' => 'required|min:4',
            'durasi' => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $data = [
                'idKol' => Session::get('login')['id'],
                'idSocmed' => $request->akun,
                'service' => $request->service,
                'price' => str_replace(',', '', $request->price),
                'sosmedtype' => $request->platform,
                'durasi' => $request->durasi
            ];

            Kolservice::create($data);
            return redirect()->route('user.service');
        }
    }

    public function detService($sosmedtype, $id)
    {
        $data['sosmed'] = Socialmediatype::get();
        $data['servicetype'] = Servicetype::where(['sosmedtype' => $sosmedtype])->get();
        $data['service'] = Kolsosmed::where(['sosmedtype' => $sosmedtype])->get();
        $data['detail'] = Kolservice::where(['id' => $id])->first();
        $data['page_title'] = "Ubah Service";
        return view('user.service-edit', $data);
    }

    public function updateService(Request $request)
    {
        $rules = array(
            'service' => 'required',
            'akun' => 'required',
            'price' => 'required|min:4',
            'durasi' => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $data = [
                'idSocmed' => $request->akun,
                'service' => $request->service,
                'price' => str_replace(',', '', $request->price),
                'durasi' => $request->durasi
            ];

            Kolservice::find($request->id)->update($data);
            return redirect()->route('user.service');
        }
    }

    public function delService(Request $request)
    {
        Kolservice::find($request->id)->delete();
        return redirect()->route('user.service');
    }
}
