php
<?php

namespace App\Policies\Modules;

use App\Models\Modules\Cost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CostPolicy
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
        return $user->hasPermissionTo('view costs');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost  $cost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Cost $cost)
    {
        return $user->hasPermissionTo('view costs');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create costs');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost  $cost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Cost $cost)
    {
        return $user->hasPermissionTo('edit costs');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost  $cost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Cost $cost)
    {
        return $user->hasPermissionTo('delete costs');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost  $cost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Cost $cost)
    {
        return $user->hasPermissionTo('delete costs');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost  $cost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Cost $cost)
    {
        return false;
    }
}