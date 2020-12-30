<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects]);
    }
}
