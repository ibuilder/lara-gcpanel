php
<?php

namespace App\Policies;

use App\Models\CostCode;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CostCodePolicy
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
        return $user->hasPermissionTo('view cost codes');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CostCode  $costCode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CostCode $costCode)
    {
        return $user->hasPermissionTo('view cost codes');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create cost codes');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CostCode  $costCode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CostCode $costCode)
    {
        return $user->hasPermissionTo('edit cost codes');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CostCode  $costCode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CostCode $costCode)
    {
        return $user->hasPermissionTo('delete cost codes');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CostCode  $costCode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CostCode $costCode)
    {
        return $user->hasPermissionTo('delete cost codes');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CostCode  $costCode
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CostCode $costCode)
    {
        return false;
    }
}