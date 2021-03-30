<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// model
use App\Models\Project;

// helper
use Session;

class ProjectController extends Controller
{
    public function index()
    {
        $data['project'] = Project::paginate(10);
        $data['page_title'] = "KOL Management - Project";
        return view('media.project-list', $data);
    }

    public function submit(Request $request)
    {
        $rules = array(
            'name' => 'required|min:4',
            'client' => 'required|min:4',
            'start_date' => 'required',
            'end_date' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {

            $data = [
                'name' => $request->name,
                'client' => $request->client,
                'start_date' => date('Y-m-d', strtotime($request->start_date)),
                'end_date' => date('Y-m-d', strtotime($request->end_date)),
                'slug' => rand(0, 999).'-'.Str::slug($request->name.'-'.$request->client)
            ];
            Project::create($data);
            return redirect()->route('media.project');
        }
    }

    public function getData($slug)
    {
        $getData = Project::where(['slug' => $slug])->first();
        $data['detail'] = Project::where(['slug' => $slug])->first();
        // dd($data['sosmed']->toArray());
        $data['page_title'] = "Project ".$getData['name'];
        return view('media.project-edit', $data);
    }

    public function
    update(Request $request)
    {
        $rules = array(
            'name' => 'required|min:4',
            'client' => 'required|min:4',
            'start_date' => 'required',
            'end_date' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        } else {

            $data = [
                'start_date' => date('Y-m-d', strtotime($request->start_date)),
                'end_date' => date('Y-m-d', strtotime($request->end_date)),
                'slug' => rand(0, 999) . '-' . Str::slug($request->name . '-' . $request->client)
            ];
            Project::find($request->id)->update($data);
            return redirect()->route('media.project');
        }
    }

}
