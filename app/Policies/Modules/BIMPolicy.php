<?php

namespace App\Policies\Modules;

use App\Models\Modules\BIM; // Assuming a BIM model exists in App\Models\Modules
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BIMPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view any bim models');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BIM $bim): bool
    {
        return $user->hasPermissionTo('view bim models');
        // Add project-specific checks if necessary:
        // && $user->project_id === $bim->project_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create bim models');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BIM $bim): bool
    {
        return $user->hasPermissionTo('update bim models');
        // Add project-specific checks if necessary
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BIM $bim): bool
    {
        return $user->hasPermissionTo('delete bim models');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BIM $bim): bool
    {
        return $user->hasPermissionTo('restore bim models');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BIM $bim): bool
    {
        return $user->hasPermissionTo('force delete bim models');
    }
}