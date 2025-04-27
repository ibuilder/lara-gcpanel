php
<?php

namespace App\Policies\Modules\Field;

use App\Models\Modules\Field\PhotoLibrary;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoLibraryPolicy
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
        return $user->hasPermissionTo('view photo libraries');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\PhotoLibrary  $photoLibrary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PhotoLibrary $photoLibrary)
    {
        return $user->hasPermissionTo('view photo libraries');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create photo libraries');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\PhotoLibrary  $photoLibrary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PhotoLibrary $photoLibrary)
    {
        return $user->hasPermissionTo('edit photo libraries');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\PhotoLibrary  $photoLibrary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PhotoLibrary $photoLibrary)
    {
        return $user->hasPermissionTo('delete photo libraries');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\PhotoLibrary  $photoLibrary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PhotoLibrary $photoLibrary)
    {
        return $user->hasPermissionTo('delete photo libraries');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\PhotoLibrary  $photoLibrary
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PhotoLibrary $photoLibrary)
    {
        return false;
    }
}