php
<?php

namespace App\Policies\Modules\Resources;

use App\Models\Modules\Resources\MaterialRate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaterialRatePolicy
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
        return $user->hasPermissionTo('view material rates');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\MaterialRate  $materialRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MaterialRate $materialRate)
    {
        return $user->hasPermissionTo('view material rates');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create material rates');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\MaterialRate  $materialRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MaterialRate $materialRate)
    {
        return $user->hasPermissionTo('edit material rates');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\MaterialRate  $materialRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MaterialRate $materialRate)
    {
        return $user->hasPermissionTo('delete material rates');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\MaterialRate  $materialRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MaterialRate $materialRate)
    {
        return $user->hasPermissionTo('delete material rates');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Resources\MaterialRate  $materialRate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MaterialRate $materialRate)
    {
        return false;
    }
}