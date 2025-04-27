php
<?php

namespace App\Policies\Modules\Contracts;

use App\Models\Modules\Contracts\PSA;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PSAPolicy
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
        return $user->hasPermissionTo('view psas');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PSA  $pSA
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PSA $pSA)
    {
        return $user->hasPermissionTo('view psas');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create psas');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PSA  $pSA
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PSA $pSA)
    {
        return $user->hasPermissionTo('edit psas');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PSA  $pSA
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PSA $pSA)
    {
        return $user->hasPermissionTo('delete psas');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PSA  $pSA
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PSA $pSA)
    {
        return $user->hasPermissionTo('delete psas');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PSA  $pSA
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PSA $pSA)
    {
        return false;
    }
}