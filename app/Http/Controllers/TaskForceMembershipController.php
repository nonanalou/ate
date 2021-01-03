<?php

namespace App\Http\Controllers;

use App\Models\TaskForce;
use App\Models\TaskForceMembership;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TaskForceMembershipController extends Controller
{
    public function create(TaskForce $taskForce)
    {
        $users = User::whereDoesntHave('taskForces', function (Builder $query) use ($taskForce) {
            $query->where('task_force_id', $taskForce->id);
        })->get();
        return view('task-force-memberships.new', ['users' => $users, 'taskForce' => $taskForce]);
    }

    public function store(TaskForce $taskForce, Request $request)
    {
        $values = $request->validate([
            'user_id' => 'exists:users,id|required'
        ]);

        $user = User::findOrFail($values['user_id']);

        TaskForceMembership::create([
            'user_id' => $user->id,
            'task_force_id' => $taskForce->id
        ]);
        return redirect()->route('new-task-force-member', $taskForce);
    }
}
