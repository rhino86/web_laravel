<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

// model
use App\Models\Province;
use App\Models\Audienscharacter;
use App\Models\Religion;
use App\Models\Kol;
use App\Models\Kolservice;
use App\Models\Kolsosmed;
use App\Models\Socialmediatype;

// helper
use Session;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $data['sosmed'] = Kolsosmed::with('toSosmed')
                                    ->where(['idKol' => Session::get('login')['id']])->get();
        $data['post'] = Kolsosmed::where(['idKol' => Session::get('login')['id']])
                                   ->sum('post');
        $data['follower'] = Kolsosmed::where(['idKol' => Session::get('login')['id']])
                                   ->sum('follower');
        $data['like'] = Kolsosmed::where(['idKol' => Session::get('login')['id']])
                                   ->sum('like');
        
        $data['page_title'] = "Halaman Profil";
        return view('user.profil', $data);
    }

    public function getProfil()
    {
        $data['religion'] = Religion::get();
        $data['province'] = Province::get();
        $data['interest'] = Audienscharacter::get();
        $data['detail'] = Kol::where(['id' => Session::get('login')['id']])->first();
        $data['page_title'] = 'Perbaharui Profil';
        return view('user.profil_form', $data);
    }

    public function updateProfil(Request $request)
    {
        $rules = array(
            'name' => 'required|min:3',
            'gender' => 'required',
            'religion' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'location' => 'required',
            'contact_person' => 'required|min:3',
            'bank_name' => 'required',
            'bank_account' => 'required|min:3',
            'bank_number_account' => 'required|min:3',
            'interst' => 'required',
            'audience_character' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            dd($messages);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $arr_interst = [];
            for ($i=0; $i < count($_POST['interst']) ; $i++) { 
                $getInterst = Audienscharacter::where(['description' => $_POST['interst'][$i]])->count();
                if ($getInterst == 0) {
                    $data_insert = [
                        'description' => ucwords($_POST['interst'][$i]),
                        'slug' => Str::slug($_POST['interst'][$i])
                    ];
                    $getId = Audienscharacter::create($data_insert);   
                }

                $arr_interst[] = $_POST['interst'][$i];
            }
            $arr_audiens = [];
            for ($i=0; $i < count($_POST['audience_character']) ; $i++) {
                $getInterst = Audienscharacter::where(['description' => $_POST['audience_character'][$i]])->count();
                if ($getInterst == 0) {
                    $data_insert = [
                        'description' => ucwords($_POST['audience_character'][$i]),
                        'slug' => Str::slug($_POST['audience_character'][$i])
                    ];
                    $getId = Audienscharacter::create($data_insert);   
                }
                $arr_audiens[] = $_POST['audience_character'][$i];
            }
            $data = [
                'name' => $request->name,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'tempatLahir' => $request->tempatLahir,
                'tanggalLahir' => date('Y-m-d', strtotime($request->tanggalLahir)),
                'location' => $request->location,
                'contact_person' => $request->contact_person,
                'bank_name' => $request->bank_name,
                'description' => $request->description,
                'bank_account' => $request->bank_account,
                'bank_number_account' => $request->bank_number_account,
                'interst' => implode(';', $arr_interst),
                'audience_character' => implode(';', $arr_audiens)
            ];

            Kol::find(Session::get('login')['id'])->update($data);

            return redirect()->route('user.profil');
        }
    }

    public function sosmed()
    {
        $data['sosmed'] = Socialmediatype::get();
        $data['page_title'] = "Halaman Profil";
        return view('user.add_sosmed', $data);
    }

    public function addSosmed(Request $request)
    {
        $rules = array(
            'username' => 'required|min:3',
            'url' => 'required|min:5',
            'follower' => 'required|numeric',
            'comment' => 'required|numeric',
            'like' => 'required|numeric',
            'engagement' => 'required|numeric',
            'engagement_rate' => 'required'
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
                'username' => $request->username,
                'url' => $request->url,
                'sosmedtype' => $request->sosmedtype,
                'follower' => $request->follower,
                'like' => $request->like,
                'post' => $request->post,
                'engagement' => $request->engagement,
                'engagementrate' => $request->engagement_rate,
                'comment' => $request->comment
            ];

            Kolsosmed::create($data);

            return redirect()->route('user.profil');
        }
    }

    public function detail($id)
    {
        $data['master'] = Kolsosmed::where(['id' => $id])->first();
        $data['sosmed'] = Socialmediatype::get();
        $data['page_title'] = "Halaman Profil";
        return view('user.edit_sosmed', $data);
    }

    public function updateSosmed(Request $request)
    {
        $rules = array(
            'username' => 'required|min:3',
            'url' => 'required|min:5',
            'follower' => 'required|numeric',
            'comment' => 'required|numeric',
            'like' => 'required|numeric',
            'engagement' => 'required|numeric',
            'engagement_rate' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $data = [

                'username' => $request->username,
                'url' => $request->url,
                'sosmedtype' => $request->sosmedtype,
                'follower' => $request->follower,
                'like' => $request->like,
                'post' => $request->post,
                'engagement' => $request->engagement,
                'engagementrate' => $request->engagement_rate,
                'comment' => $request->comment
            ];

            Kolsosmed::find($request->id)->update($data);

            return redirect()->route('user.profil');
        }
    }

    public function delete($id)
    {
        Kolsosmed::find($id)->delete();
        return redirect()->route('user.profil');
    }

}
