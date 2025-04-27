php
<?php

namespace App\Policies\Modules\Field;

use App\Models\Modules\Field\Punchlist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PunchlistPolicy
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
        return $user->hasPermissionTo('view punchlists');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\Punchlist  $punchlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Punchlist $punchlist)
    {
        return $user->hasPermissionTo('view punchlists');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create punchlists');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\Punchlist  $punchlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Punchlist $punchlist)
    {
        return $user->hasPermissionTo('edit punchlists');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\Punchlist  $punchlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Punchlist $punchlist)
    {
        return $user->hasPermissionTo('delete punchlists');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\Punchlist  $punchlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Punchlist $punchlist)
    {
        return $user->hasPermissionTo('delete punchlists');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\Punchlist  $punchlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Punchlist $punchlist)
    {
        return false;
    }
}