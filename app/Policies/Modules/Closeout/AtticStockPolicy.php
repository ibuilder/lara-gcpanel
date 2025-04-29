<?php

namespace App\Policies\Modules\Closeout;

use App\Models\Modules\Closeout\AtticStock;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AtticStockPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view any attic stock');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AtticStock $atticStock): bool
    {
        // Example: Check if user has permission or belongs to the same project, etc.
        return $user->hasPermissionTo('view attic stock');
        // Or: return $user->hasPermissionTo('view attic stock') && $user->project_id === $atticStock->project_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create attic stock');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AtticStock $atticStock): bool
    {
        return $user->hasPermissionTo('update attic stock');
        // Or: return $user->hasPermissionTo('update attic stock') && $user->project_id === $atticStock->project_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AtticStock $atticStock): bool
    {
        return $user->hasPermissionTo('delete attic stock');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AtticStock $atticStock): bool
    {
        return $user->hasPermissionTo('restore attic stock');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AtticStock $atticStock): bool
    {
        return $user->hasPermissionTo('force delete attic stock');
    }
}