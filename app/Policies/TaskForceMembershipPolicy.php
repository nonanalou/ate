<?php

namespace App\Policies;

use App\Models\TaskForceMembership;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskForceMembershipPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->role->name === 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TaskForceMembership  $taskForceMembership
     * @return mixed
     */
    public function view(User $user, TaskForceMembership $taskForceMembership)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TaskForceMembership  $taskForceMembership
     * @return mixed
     */
    public function update(User $user, TaskForceMembership $taskForceMembership)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TaskForceMembership  $taskForceMembership
     * @return mixed
     */
    public function delete(User $user, TaskForceMembership $taskForceMembership)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TaskForceMembership  $taskForceMembership
     * @return mixed
     */
    public function restore(User $user, TaskForceMembership $taskForceMembership)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TaskForceMembership  $taskForceMembership
     * @return mixed
     */
    public function forceDelete(User $user, TaskForceMembership $taskForceMembership)
    {
        //
    }
}
