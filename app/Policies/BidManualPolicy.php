php
<?php

namespace App\Policies;

use App\Models\BidManual;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BidManualPolicy
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
        return $user->hasPermissionTo('view bid manuals');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidManual  $bidManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BidManual $bidManual)
    {
        return $user->hasPermissionTo('view bid manuals');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create bid manuals');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidManual  $bidManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BidManual $bidManual)
    {
        return $user->hasPermissionTo('edit bid manuals');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidManual  $bidManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BidManual $bidManual)
    {
        return $user->hasPermissionTo('delete bid manuals');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidManual  $bidManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BidManual $bidManual)
    {
        return $user->hasPermissionTo('delete bid manuals');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidManual  $bidManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BidManual $bidManual)
    {
        return false;
    }
}