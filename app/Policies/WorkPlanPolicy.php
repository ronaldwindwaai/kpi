<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkPlan;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkPlanPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(['super-admin', 'manager', 'officer']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkPlan  $workPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, WorkPlan $work_plan)
    {
        return $user->id === $work_plan->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole(['super-admin']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkPlan  $workPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, WorkPlan $work_plan)
    {
        return ($user->id !== $work_plan->id) || ($user->hasRole(['super-admin']));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkPlan  $workPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, WorkPlan $work_plan)
    {
        return ($user->id !== $work_plan->id) || ($user->hasRole(['super-admin']));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkPlan  $workPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, WorkPlan $workPlan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WorkPlan  $workPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, WorkPlan $workPlan)
    {
        //
    }
}
