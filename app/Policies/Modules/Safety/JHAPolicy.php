<?php

namespace App\Policies\Modules\Safety;

use App\Models\Modules\Safety\JHA; // Assuming model name is JHA
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JHAPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view any jhas');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JHA $jha): bool
    {
        return $user->hasPermissionTo('view jhas');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create jhas');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JHA $jha): bool
    {
        return $user->hasPermissionTo('update jhas');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JHA $jha): bool
    {
        return $user->hasPermissionTo('delete jhas');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JHA $jha): bool
    {
        return $user->hasPermissionTo('restore jhas');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JHA $jha): bool
    {
        return $user->hasPermissionTo('force delete jhas');
    }
}