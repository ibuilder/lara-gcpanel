php
<?php

namespace App\Policies\Modules\Closeout;

use App\Models\Modules\Closeout\O&MManual;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class O&MManualPolicy
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
        return $user->hasPermissionTo('view o&m manuals');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\O&MManual  $oMManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, O&MManual $oMManual)
    {
        return $user->hasPermissionTo('view o&m manuals');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create o&m manuals');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\O&MManual  $oMManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, O&MManual $oMManual)
    {
        return $user->hasPermissionTo('edit o&m manuals');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\O&MManual  $oMManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, O&MManual $oMManual)
    {
        return $user->hasPermissionTo('delete o&m manuals');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\O&MManual  $oMManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, O&MManual $oMManual)
    {
        return $user->hasPermissionTo('delete o&m manuals');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Closeout\O&MManual  $oMManual
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, O&MManual $oMManual)
    {
        return false;
    }
}