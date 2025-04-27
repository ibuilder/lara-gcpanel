php
<?php

namespace App\Policies\Modules\Resources;

use App\Models\Modules\Resources\LaborRate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LaborRatePolicy
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
        return $user->hasPermissionTo('view labor rates');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\LaborRate  $laborRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, LaborRate $laborRate)
    {
        return $user->hasPermissionTo('view labor rates');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create labor rates');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\LaborRate  $laborRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, LaborRate $laborRate)
    {
        return $user->hasPermissionTo('edit labor rates');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\LaborRate  $laborRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, LaborRate $laborRate)
    {
        return $user->hasPermissionTo('delete labor rates');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\LaborRate  $laborRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, LaborRate $laborRate)
    {
        return $user->hasPermissionTo('delete labor rates');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\LaborRate  $laborRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, LaborRate $laborRate)
    {
        return false;
    }
}