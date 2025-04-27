php
<?php

namespace App\Policies;

use App\Models\ProjectInfo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectInfoPolicy
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
        return $user->hasPermissionTo('view projectinfos');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectInfo  $projectInfo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProjectInfo $projectInfo)
    {
        return $user->hasPermissionTo('view projectinfos');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create projectinfos');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectInfo  $projectInfo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProjectInfo $projectInfo)
    {
        return $user->hasPermissionTo('edit projectinfos');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectInfo  $projectInfo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProjectInfo $projectInfo)
    {
        return $user->hasPermissionTo('delete projectinfos');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectInfo  $projectInfo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProjectInfo $projectInfo)
    {
        return $user->hasPermissionTo('delete projectinfos');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProjectInfo  $projectInfo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProjectInfo $projectInfo)
    {
        return false;
    }
}