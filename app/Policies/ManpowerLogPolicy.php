php
<?php

namespace App\Policies;

use App\Models\ManpowerLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManpowerLogPolicy
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
        return $user->hasPermissionTo('view manpower logs');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManpowerLog  $manpowerLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ManpowerLog $manpowerLog)
    {
        return $user->hasPermissionTo('view manpower logs');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create manpower logs');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManpowerLog  $manpowerLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ManpowerLog $manpowerLog)
    {
        return $user->hasPermissionTo('edit manpower logs');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManpowerLog  $manpowerLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ManpowerLog $manpowerLog)
    {
        return $user->hasPermissionTo('delete manpower logs');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManpowerLog  $manpowerLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ManpowerLog $manpowerLog)
    {
        return $user->hasPermissionTo('delete manpower logs');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManpowerLog  $manpowerLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ManpowerLog $manpowerLog)
    {
        return false;
    }
}