<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TaskForce;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects]);
    }

    public function create()
    {
        return view('projects.new', ['taskForces' => TaskForce::all()]);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required|min:7|unique:projects,name',
            'shortDescription' => 'required',
            'owner' => 'required|exists:task_forces,id',
        ]);
        $project = Project::create([
            'name' => $values['name'],
            'shortDescription' => $values['shortDescription'],
            'owner_taskforce_id' => $values['owner']
        ]);
        Log::info("Project '{$project->name}' has been created");
        return redirect()->route('projects');
    }
}
