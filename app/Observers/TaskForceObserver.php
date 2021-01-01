<?php

namespace App\Observers;

use App\Models\TaskForce;
use Illuminate\Support\Facades\Log;

class TaskForceObserver
{
    /**
     * Handle the TaskForce "created" event.
     *
     * @param  \App\Models\TaskForce  $taskForce
     * @return void
     */
    public function created(TaskForce $taskForce)
    {
        Log::info("Task-Force {$taskForce->id} with the name {$taskForce->name} was created");
    }

    /**
     * Handle the TaskForce "updated" event.
     *
     * @param  \App\Models\TaskForce  $taskForce
     * @return void
     */
    public function updated(TaskForce $taskForce)
    {
        Log::info("Task-Force {$taskForce->id} was updated");
    }

    /**
     * Handle the TaskForce "deleted" event.
     *
     * @param  \App\Models\TaskForce  $taskForce
     * @return void
     */
    public function deleted(TaskForce $taskForce)
    {
        Log::info("Task-Force {$taskForce->id} was deleted");
    }

    /**
     * Handle the TaskForce "restored" event.
     *
     * @param  \App\Models\TaskForce  $taskForce
     * @return void
     */
    public function restored(TaskForce $taskForce)
    {
        Log::info("Task-Force {$taskForce->id} was restored");
    }

    /**
     * Handle the TaskForce "force deleted" event.
     *
     * @param  \App\Models\TaskForce  $taskForce
     * @return void
     */
    public function forceDeleted(TaskForce $taskForce)
    {
        Log::info("Task-Force {$taskForce->id} was forceDeleted");
    }
}
