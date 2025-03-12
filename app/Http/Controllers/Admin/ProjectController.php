<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('status')->get();
        $statuses = Status::all(); // Tambahin ini buat dropdown status
    
        return view('pages.projects.index', compact('projects', 'statuses'));
    }
    
    public function create() {
        $statuses = Status::all();

        return view('pages.projects.create', [
            "statuses" => $statuses,
        ]);
    }

    public function masterp(Request $request)
    {
        $validated = $request->validate([
            "project_code" => "required",
            "status_id" => "required",
            "material" => "required",
            "project_description" => "nullable",
            "start_date" => "required",
            "finish_date" => "required",
            "qty" => "required",
        ]);

        Project::create([
            "project_code" => $request->input('project_code'),
            "status_id" => $request->input('status_id'),
            "material" => $request->input('material'),
            "project_description" => $request->input('project_description'),
            "start_date" => $request->input('start_date'),
            "finish_date" => $request->input('finish_date'),
            "qty" => $request->input('qty'),
        ]);

        return redirect('/projects');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $statuses = Status::all();

        return view('pages.projects.edit', compact('project', 'statuses'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "project_code" => "required",
            "status_id" => "required",
            "material" => "required",
            "project_description" => "nullable",
            "start_date" => "required",
            "finish_date" => "required",
            "qty" => "required",
        ]);

        Project::where('id', $id)->update([
            "project_code" => $request->input('project_code'),
            "status_id" => $request->input('status_id'),
            "material" => $request->input('material'),
            "project_description" => $request->input('project_description'),
            "start_date" => $request->input('start_date'),
            "finish_date" => $request->input('finish_date'),
            "qty" => $request->input('qty'),
        ]);

        return redirect('/projects')->with('success', 'Project updated successfully!');
    }


    public function delete($id)
    {
        $product = Project::where('id', $id);
        $product->delete();

        return redirect('/projects');
    }
}
