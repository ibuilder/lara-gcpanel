php
<?php

namespace App\Policies\Modules\Engineering;

use App\Models\Modules\Engineering\Specification;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpecificationPolicy
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
        return $user->hasPermissionTo('view specifications');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Specification  $specification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Specification $specification)
    {
        return $user->hasPermissionTo('view specifications');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create specifications');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Specification  $specification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Specification $specification)
    {
        return $user->hasPermissionTo('edit specifications');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Specification  $specification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Specification $specification)
    {
        return $user->hasPermissionTo('delete specifications');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Specification  $specification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Specification $specification)
    {
        return $user->hasPermissionTo('delete specifications');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Specification  $specification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Specification $specification)
    {
        return false;
    }
}