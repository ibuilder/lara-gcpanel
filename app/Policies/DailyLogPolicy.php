php
<?php

namespace App\Policies;

use App\Models\DailyLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DailyLogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view daily logs');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DailyLog $dailyLog)
    {
        return $user->hasPermissionTo('view daily logs');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create daily logs');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DailyLog $dailyLog)
    {
        return $user->hasPermissionTo('edit daily logs');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DailyLog $dailyLog)
    {
        return $user->hasPermissionTo('delete daily logs');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DailyLog $dailyLog)
    {
        return $user->hasPermissionTo('delete daily logs');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DailyLog $dailyLog)
    {
        return false;
    }
}