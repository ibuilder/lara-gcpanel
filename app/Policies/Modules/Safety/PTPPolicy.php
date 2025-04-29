<?php

namespace App\Policies\Modules\Safety;

use App\Models\Modules\Safety\PTP; // Assuming model name is PTP
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PTPPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view any ptps');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PTP $ptp): bool
    {
        return $user->hasPermissionTo('view ptps');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create ptps');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PTP $ptp): bool
    {
        return $user->hasPermissionTo('update ptps');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PTP $ptp): bool
    {
        return $user->hasPermissionTo('delete ptps');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PTP $ptp): bool
    {
        return $user->hasPermissionTo('restore ptps');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PTP $ptp): bool
    {
        return $user->hasPermissionTo('force delete ptps');
    }
}