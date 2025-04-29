<?php

namespace App\Policies\Modules\Safety;

use App\Models\Modules\Safety\EmployeeOrientation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeeOrientationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view any employee orientations');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EmployeeOrientation $employeeOrientation): bool
    {
        return $user->hasPermissionTo('view employee orientations');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create employee orientations');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EmployeeOrientation $employeeOrientation): bool
    {
        return $user->hasPermissionTo('update employee orientations');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EmployeeOrientation $employeeOrientation): bool
    {
        return $user->hasPermissionTo('delete employee orientations');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EmployeeOrientation $employeeOrientation): bool
    {
        return $user->hasPermissionTo('restore employee orientations');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EmployeeOrientation $employeeOrientation): bool
    {
        return $user->hasPermissionTo('force delete employee orientations');
    }
}