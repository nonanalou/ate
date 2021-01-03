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

    public function create(TaskForce $taskForce)
    {
        $this->authorize('create', [Project::class, $taskForce]);
        return view('projects.new', ['taskForce' => $taskForce]);
    }

    public function store(TaskForce $taskForce, Request $request)
    {
        $this->authorize('create', [Project::class, $taskForce]);
        $values = $request->validate([
            'name' => 'required|min:7|unique:projects,name',
            'shortDescription' => 'required|min:1'
        ]);

        $project = Project::create([
            'name' => $values['name'],
            'shortDescription' => $values['shortDescription'],
            'owner_taskforce_id' => $taskForce->id
        ]);

        return redirect()
            ->route('task-force', $taskForce)
            ->with('success', "Project {$project->name} created");
    }

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }
}
