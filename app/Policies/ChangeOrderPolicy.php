php
<?php

namespace App\Policies;

use App\Models\ChangeOrder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChangeOrderPolicy
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
        return $user->hasPermissionTo('view change orders');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChangeOrder  $changeOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ChangeOrder $changeOrder)
    {
        return $user->hasPermissionTo('view change orders');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create change orders');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChangeOrder  $changeOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ChangeOrder $changeOrder)
    {
        return $user->hasPermissionTo('edit change orders');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChangeOrder  $changeOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ChangeOrder $changeOrder)
    {
        return $user->hasPermissionTo('delete change orders');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChangeOrder  $changeOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ChangeOrder $changeOrder)
    {
        return $user->hasPermissionTo('delete change orders');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChangeOrder  $changeOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ChangeOrder $changeOrder)
    {
        return false;
    }
}