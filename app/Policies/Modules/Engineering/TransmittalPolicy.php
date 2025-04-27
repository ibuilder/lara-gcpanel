php
<?php

namespace App\Policies\Modules\Engineering;

use App\Models\Modules\Engineering\Transmittal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransmittalPolicy
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
        return $user->hasPermissionTo('view transmittals');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Transmittal  $transmittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Transmittal $transmittal)
    {
        return $user->hasPermissionTo('view transmittals');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create transmittals');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Transmittal  $transmittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Transmittal $transmittal)
    {
        return $user->hasPermissionTo('edit transmittals');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Transmittal  $transmittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Transmittal $transmittal)
    {
        return $user->hasPermissionTo('delete transmittals');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Transmittal  $transmittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Transmittal $transmittal)
    {
        return $user->hasPermissionTo('delete transmittals');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Transmittal  $transmittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Transmittal $transmittal)
    {
        return false;
    }
}