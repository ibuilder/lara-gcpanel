php
<?php

namespace App\Policies\Modules;

use App\Models\Modules\Contracts;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContractsPolicy
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
        return $user->hasPermissionTo('view contracts');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts  $contracts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Contracts $contracts)
    {
        return $user->hasPermissionTo('view contracts');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create contracts');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts  $contracts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Contracts $contracts)
    {
        return $user->hasPermissionTo('edit contracts');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts  $contracts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Contracts $contracts)
    {
        return $user->hasPermissionTo('delete contracts');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts  $contracts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Contracts $contracts)
    {
        return $user->hasPermissionTo('delete contracts');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts  $contracts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Contracts $contracts)
    {
        return false;
    }
}