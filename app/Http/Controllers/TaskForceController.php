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
        return view('task-forces.index', ['taskForces' => $taskForces]);
    }

    //show one Task-Force
    public function show(TaskForce $taskForce)
    {
        return view('task-forces.show', ['taskForce' => $taskForce]);
    }
}
