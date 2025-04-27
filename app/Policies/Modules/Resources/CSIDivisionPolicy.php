php
<?php

namespace App\Policies\Modules\Resources;

use App\Models\Modules\Resources\CSIDivision;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CSIDivisionPolicy
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
        return $user->hasPermissionTo('view csi divisions');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\CSIDivision  $cSIDivision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CSIDivision $cSIDivision)
    {
        return $user->hasPermissionTo('view csi divisions');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create csi divisions');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\CSIDivision  $cSIDivision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CSIDivision $cSIDivision)
    {
        return $user->hasPermissionTo('edit csi divisions');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\CSIDivision  $cSIDivision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CSIDivision $cSIDivision)
    {
        return $user->hasPermissionTo('delete csi divisions');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\CSIDivision  $cSIDivision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CSIDivision $cSIDivision)
    {
        return $user->hasPermissionTo('delete csi divisions');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\CSIDivision  $cSIDivision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CSIDivision $cSIDivision)
    {
        return false;
    }
}