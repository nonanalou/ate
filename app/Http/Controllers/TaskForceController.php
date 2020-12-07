<?php

namespace App\Http\Controllers;

use App\Models\TaskForce;
use Illuminate\Http\Request;

class TaskForceController extends Controller
{
    //
    public function index()
    {
        $taskForces = TaskForce::all();
        return view('task-force.index', ['taskForces' => $taskForces]);
    }
}
