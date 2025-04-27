php
<?php

namespace App\Policies;

use App\Models\BidPackage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BidPackagePolicy
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
        return $user->hasPermissionTo('view bid packages');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidPackage  $bidPackage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BidPackage $bidPackage)
    {
        return $user->hasPermissionTo('view bid packages');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create bid packages');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidPackage  $bidPackage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BidPackage $bidPackage)
    {
        return $user->hasPermissionTo('edit bid packages');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidPackage  $bidPackage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BidPackage $bidPackage)
    {
        return $user->hasPermissionTo('delete bid packages');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidPackage  $bidPackage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BidPackage $bidPackage)
    {
        return $user->hasPermissionTo('delete bid packages');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BidPackage  $bidPackage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BidPackage $bidPackage)
    {
        return false;
    }
}