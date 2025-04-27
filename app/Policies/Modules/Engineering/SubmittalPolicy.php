php
<?php

namespace App\Policies\Modules\Engineering;

use App\Models\Modules\Engineering\Submittal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubmittalPolicy
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
        return $user->hasPermissionTo('view submittals');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Submittal  $submittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Submittal $submittal)
    {
        return $user->hasPermissionTo('view submittals');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create submittals');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Submittal  $submittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Submittal $submittal)
    {
        return $user->hasPermissionTo('edit submittals');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Submittal  $submittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Submittal $submittal)
    {
        return $user->hasPermissionTo('delete submittals');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Submittal  $submittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Submittal $submittal)
    {
        return $user->hasPermissionTo('delete submittals');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Submittal  $submittal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Submittal $submittal)
    {
        return false;
    }
}