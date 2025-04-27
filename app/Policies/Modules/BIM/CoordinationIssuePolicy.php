php
<?php

namespace App\Policies\Modules\BIM;

use App\Models\Modules\BIM\CoordinationIssue;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoordinationIssuePolicy
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
        return $user->hasPermissionTo('view coordination issues');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\CoordinationIssue  $coordinationIssue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CoordinationIssue $coordinationIssue)
    {
        return $user->hasPermissionTo('view coordination issues');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create coordination issues');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\CoordinationIssue  $coordinationIssue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CoordinationIssue $coordinationIssue)
    {
        return $user->hasPermissionTo('edit coordination issues');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\CoordinationIssue  $coordinationIssue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CoordinationIssue $coordinationIssue)
    {
        return $user->hasPermissionTo('delete coordination issues');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\CoordinationIssue  $coordinationIssue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CoordinationIssue $coordinationIssue)
    {
        return $user->hasPermissionTo('delete coordination issues');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\CoordinationIssue  $coordinationIssue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CoordinationIssue $coordinationIssue)
    {
        return false;
    }
}