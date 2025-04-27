php
<?php

namespace App\Policies\Modules\Closeout;

use App\Models\Modules\Closeout\Warranty;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WarrantyPolicy
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
        return $user->hasPermissionTo('view warranties');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\Warranty  $warranty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Warranty $warranty)
    {
        return $user->hasPermissionTo('view warranties');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create warranties');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\Warranty  $warranty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Warranty $warranty)
    {
        return $user->hasPermissionTo('edit warranties');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\Warranty  $warranty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Warranty $warranty)
    {
        return $user->hasPermissionTo('delete warranties');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\Warranty  $warranty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Warranty $warranty)
    {
        return $user->hasPermissionTo('delete warranties');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\Warranty  $warranty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Warranty $warranty)
    {
        return false;
    }
}