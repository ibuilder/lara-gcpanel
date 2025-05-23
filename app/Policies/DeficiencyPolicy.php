php
<?php

namespace App\Policies;

use App\Models\Deficiency;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeficiencyPolicy
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
        return $user->hasPermissionTo('view deficiencies');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Deficiency  $deficiency
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Deficiency $deficiency)
    {
        return $user->hasPermissionTo('view deficiencies');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create deficiencies');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Deficiency  $deficiency
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Deficiency $deficiency)
    {
        return $user->hasPermissionTo('edit deficiencies');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Deficiency  $deficiency
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Deficiency $deficiency)
    {
        return $user->hasPermissionTo('delete deficiencies');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Deficiency  $deficiency
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Deficiency $deficiency)
    {
        return $user->hasPermissionTo('delete deficiencies');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Deficiency  $deficiency
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Deficiency $deficiency)
    {
        return false;
    }
}