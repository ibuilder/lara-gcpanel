php
<?php

namespace App\Policies\Modules\Contracts;

use App\Models\Modules\Contracts\Subcontract;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubcontractPolicy
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
        return $user->hasPermissionTo('view subcontracts');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\Subcontract  $subcontract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Subcontract $subcontract)
    {
        return $user->hasPermissionTo('view subcontracts');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create subcontracts');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\Subcontract  $subcontract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Subcontract $subcontract)
    {
        return $user->hasPermissionTo('edit subcontracts');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\Subcontract  $subcontract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Subcontract $subcontract)
    {
        return $user->hasPermissionTo('delete subcontracts');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\Subcontract  $subcontract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Subcontract $subcontract)
    {
        return $user->hasPermissionTo('delete subcontracts');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\Subcontract  $subcontract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Subcontract $subcontract)
    {
        return false;
    }
}