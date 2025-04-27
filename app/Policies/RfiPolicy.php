php
<?php

namespace App\Policies;

use App\Models\Rfi;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RfiPolicy
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
        return $user->hasPermissionTo('view rfis');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rfi  $rfi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Rfi $rfi)
    {
        return $user->hasPermissionTo('view rfis');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create rfis');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rfi  $rfi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Rfi $rfi)
    {
        return $user->hasPermissionTo('edit rfis');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rfi  $rfi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Rfi $rfi)
    {
        return $user->hasPermissionTo('delete rfis');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rfi  $rfi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Rfi $rfi)
    {
        return $user->hasPermissionTo('delete rfis');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rfi  $rfi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Rfi $rfi)
    {
        return false;
    }
}