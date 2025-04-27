php
<?php

namespace App\Policies\Modules\Cost;

use App\Models\Modules\Cost\PotentialChange;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PotentialChangePolicy
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
        return $user->hasPermissionTo('view potential changes');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\PotentialChange  $potentialChange
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PotentialChange $potentialChange)
    {
        return $user->hasPermissionTo('view potential changes');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create potential changes');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\PotentialChange  $potentialChange
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PotentialChange $potentialChange)
    {
        return $user->hasPermissionTo('edit potential changes');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\PotentialChange  $potentialChange
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PotentialChange $potentialChange)
    {
        return $user->hasPermissionTo('delete potential changes');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\PotentialChange  $potentialChange
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PotentialChange $potentialChange)
    {
        return $user->hasPermissionTo('delete potential changes');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\PotentialChange  $potentialChange
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PotentialChange $potentialChange)
    {
        return false;
    }
}