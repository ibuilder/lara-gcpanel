php
<?php

namespace App\Policies\Modules\Contracts;

use App\Models\Modules\Contracts\PrimeContract;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrimeContractPolicy
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
        return $user->hasPermissionTo('view prime contracts');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PrimeContract  $primeContract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PrimeContract $primeContract)
    {
        return $user->hasPermissionTo('view prime contracts');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create prime contracts');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PrimeContract  $primeContract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PrimeContract $primeContract)
    {
        return $user->hasPermissionTo('edit prime contracts');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PrimeContract  $primeContract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PrimeContract $primeContract)
    {
        return $user->hasPermissionTo('delete prime contracts');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PrimeContract  $primeContract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PrimeContract $primeContract)
    {
        return $user->hasPermissionTo('delete prime contracts');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Contracts\PrimeContract  $primeContract
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PrimeContract $primeContract)
    {
        return false;
    }
}