php
<?php

namespace App\Policies\Modules\Contracts;

use App\Models\Modules\Contracts\LOI;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LOIPolicy
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
        return $user->hasPermissionTo('view lois');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LOI  $lOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, LOI $lOI)
    {
        return $user->hasPermissionTo('view lois');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create lois');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LOI  $lOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, LOI $lOI)
    {
        return $user->hasPermissionTo('edit lois');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LOI  $lOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, LOI $lOI)
    {
        return $user->hasPermissionTo('delete lois');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LOI  $lOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, LOI $lOI)
    {
        return $user->hasPermissionTo('delete lois');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LOI  $lOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, LOI $lOI)
    {
        return false;
    }
}