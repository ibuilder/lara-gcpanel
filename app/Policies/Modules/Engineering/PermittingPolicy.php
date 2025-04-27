php
<?php

namespace App\Policies\Modules\Engineering;

use App\Models\Modules\Engineering\Permitting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermittingPolicy
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
        return $user->hasPermissionTo('view permittings');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Permitting  $permitting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Permitting $permitting)
    {
        return $user->hasPermissionTo('view permittings');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create permittings');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Permitting  $permitting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Permitting $permitting)
    {
        return $user->hasPermissionTo('edit permittings');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Permitting  $permitting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Permitting $permitting)
    {
        return $user->hasPermissionTo('delete permittings');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Permitting  $permitting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Permitting $permitting)
    {
        return $user->hasPermissionTo('delete permittings');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Permitting  $permitting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Permitting $permitting)
    {
        return false;
    }
}