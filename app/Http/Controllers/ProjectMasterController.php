<?php

namespace App\Http\Controllers;

use App\Models\ProjectMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProjectMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectList = ProjectMaster::all();
        return view("Project.projectList", compact('projectList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projectMaster =  null;
        return view("Project.projectForm", compact('projectMaster'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "project" => 'required|string',
            "code" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('project/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            // dd($data);
            ProjectMaster::create($data);
            return redirect("/project");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectMaster $projectMaster)
    {
        return view("Project.projectForm", compact('projectMaster'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectMaster $projectMaster)
    {
        return view("Project.projectForm", compact('projectMaster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectMaster $projectMaster)
    {
        $validator = Validator::make($request->all(), [
            "project" => 'required|string',
            "code" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('project/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $validator->validated();
            $projectMaster->update($data);
            return redirect("/project");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectMaster $projectMaster)
    {
        $projectMaster->delete();
        return redirect("/project");
    }
}
