php
<?php

namespace App\Policies\Modules\Engineering;

use App\Models\Modules\Engineering\Drawing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DrawingPolicy
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
        return $user->hasPermissionTo('view drawings');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Drawing $drawing)
    {
        return $user->hasPermissionTo('view drawings');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create drawings');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Drawing $drawing)
    {
        return $user->hasPermissionTo('edit drawings');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Drawing $drawing)
    {
        return $user->hasPermissionTo('delete drawings');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Drawing $drawing)
    {
        return $user->hasPermissionTo('delete drawings');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\Drawing  $drawing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Drawing $drawing)
    {
        return false;
    }
}