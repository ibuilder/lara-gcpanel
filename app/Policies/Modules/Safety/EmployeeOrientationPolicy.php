php
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
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view employee orientations');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Safety\EmployeeOrientation  $employeeOrientation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user,