<?php

namespace App\Http\Controllers;

use App\Models\TaskForce;
use Illuminate\Http\Request;

class TaskForceController extends Controller
{
    //list all Task-Forces
    public function index()
    {
        $taskForces = TaskForce::all();
        //replace later with task-forses of the current user
        return view('task-forces.index', ['taskForces' => $taskForces]);
    }

    //show one Task-Force
    public function show(TaskForce $taskForce)
    {
        return view('task-forces.show', ['taskForce' => $taskForce]);
    }

    public function create()
    {
        $this->authorize('create', TaskForce::class);
        return view('task-forces.new');
    }

    public function store(Request $request)
    {
        $this->authorize('create', TaskForce::class);

        $values = $request->validate([
            'name' => 'required|min:1|max:80'
        ]);

        $taskForce = TaskForce::create($values);

        return redirect('task-forces')->with('success', "Task-Force {$taskForce->name} created");
    }
}
