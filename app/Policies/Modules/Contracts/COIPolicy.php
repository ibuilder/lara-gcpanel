php
<?php

namespace App\Policies\Modules\Contracts;

use App\Models\Modules\Contracts\COI;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class COIPolicy
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
        return $user->hasPermissionTo('view cois');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\COI  $cOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, COI $cOI)
    {
        return $user->hasPermissionTo('view cois');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create cois');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\COI  $cOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, COI $cOI)
    {
        return $user->hasPermissionTo('edit cois');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\COI  $cOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, COI $cOI)
    {
        return $user->hasPermissionTo('delete cois');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\COI  $cOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, COI $cOI)
    {
        return $user->hasPermissionTo('delete cois');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\COI  $cOI
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, COI $cOI)
    {
        return false;
    }
}