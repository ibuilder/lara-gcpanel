php
<?php

namespace App\Policies\Modules\Contracts;

use App\Models\Modules\Contracts\LienWaiver;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LienWaiverPolicy
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
        return $user->hasPermissionTo('view lienwaivers');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LienWaiver  $lienWaiver
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, LienWaiver $lienWaiver)
    {
        return $user->hasPermissionTo('view lienwaivers');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create lienwaivers');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LienWaiver  $lienWaiver
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, LienWaiver $lienWaiver)
    {
        return $user->hasPermissionTo('edit lienwaivers');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LienWaiver  $lienWaiver
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, LienWaiver $lienWaiver)
    {
        return $user->hasPermissionTo('delete lienwaivers');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LienWaiver  $lienWaiver
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, LienWaiver $lienWaiver)
    {
        return $user->hasPermissionTo('delete lienwaivers');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\LienWaiver  $lienWaiver
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, LienWaiver $lienWaiver)
    {
        return false;
    }
}