<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     * Typically restricted to admins or users with specific permissions.
     */
    public function viewAny(User $currentUser): bool
    {
        return $currentUser->hasPermissionTo('view any users');
    }

    /**
     * Determine whether the user can view the model.
     * Users can usually view their own profile, admins can view others.
     */
    public function view(User $currentUser, User $targetUser): bool
    {
        if ($currentUser->hasPermissionTo('view users')) {
            return true;
        }
        // Allow users to view their own profile
        return $currentUser->id === $targetUser->id;
    }

    /**
     * Determine whether the user can create models.
     * Typically restricted.
     */
    public function create(User $currentUser): bool
    {
        return $currentUser->hasPermissionTo('create users');
    }

    /**
     * Determine whether the user can update the model.
     * Users can usually update their own profile, admins can update others.
     */
    public function update(User $currentUser, User $targetUser): bool
    {
        if ($currentUser->hasPermissionTo('update users')) {
            return true;
        }
        // Allow users to update their own profile
        return $currentUser->id === $targetUser->id;
    }

    /**
     * Determine whether the user can delete the model.
     * Typically restricted, and users usually cannot delete themselves.
     */
    public function delete(User $currentUser, User $targetUser): bool
    {
        // Prevent users from deleting themselves through this policy
        if ($currentUser->id === $targetUser->id) {
            return false;
        }
        return $currentUser->hasPermissionTo('delete users');
    }

    /**
     * Determine whether the user can restore the model.
     * Typically restricted.
     */
    public function restore(User $currentUser, User $targetUser): bool
    {
        return $currentUser->hasPermissionTo('restore users');
    }

    /**
     * Determine whether the user can permanently delete the model.
     * Typically restricted.
     */
    public function forceDelete(User $currentUser, User $targetUser): bool
    {
        // Prevent users from force deleting themselves
        if ($currentUser->id === $targetUser->id) {
            return false;
        }
        return $currentUser->hasPermissionTo('force delete users');
    }
}