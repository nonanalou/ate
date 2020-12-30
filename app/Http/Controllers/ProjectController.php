<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TaskForce;
use \Illuminate\Http\Request;

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
        ['project' => $values] = $request->validate([
            'project.name' => 'required|min:7|unique:projects,name',
            'project.shortDescription' => 'required',
            'project.owner' => 'required|exists:task_forces,id',
        ]);
        Project::create([
            'name' => $values['name'],
            'shortDescription' => $values['shortDescription'],
            'owner_taskforce_id' => $values['owner']
        ]);
        return redirect()->route('projects');
    }
}
