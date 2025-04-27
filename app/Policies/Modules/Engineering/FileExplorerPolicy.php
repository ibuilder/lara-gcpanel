php
<?php

namespace App\Policies\Modules\Engineering;

use App\Models\Modules\Engineering\FileExplorer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FileExplorerPolicy
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
        return $user->hasPermissionTo('view fileexplorers');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\FileExplorer  $fileExplorer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, FileExplorer $fileExplorer)
    {
        return $user->hasPermissionTo('view fileexplorers');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create fileexplorers');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\FileExplorer  $fileExplorer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, FileExplorer $fileExplorer)
    {
        return $user->hasPermissionTo('edit fileexplorers');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\FileExplorer  $fileExplorer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, FileExplorer $fileExplorer)
    {
        return $user->hasPermissionTo('delete fileexplorers');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\FileExplorer  $fileExplorer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, FileExplorer $fileExplorer)
    {
        return $user->hasPermissionTo('delete fileexplorers');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\FileExplorer  $fileExplorer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, FileExplorer $fileExplorer)
    {
        return false;
    }
}