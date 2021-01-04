<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Log;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        $user = auth()->user();
        Log::info("Project {$project->id} was created by User {$user->id}");
    }

    /**
     * Handle the Project "updated" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {
        $user = auth()->user();
        Log::info("Project {$project->id} was updated by User {$user->id}");
    }

    /**
     * Handle the Project "deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function deleted(Project $project)
    {
        $user = auth()->user();
        Log::info("Project {$project->id} was deleted by User {$user->id}");
    }

    /**
     * Handle the Project "restored" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function restored(Project $project)
    {
        $user = auth()->user();
        Log::info("Project {$project->id} was restored by User {$user->id}");
    }

    /**
     * Handle the Project "force deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        $user = auth()->user();
        Log::info("Project {$project->id} was force deleted by User {$user->id}");
    }
}
