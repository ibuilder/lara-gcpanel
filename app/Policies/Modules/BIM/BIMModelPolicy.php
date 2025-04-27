php
<?php

namespace App\Policies\Modules;

use App\Models\Modules\BIM\BIMModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BIMModelPolicy
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
        return $user->hasPermissionTo('view bim models');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\BIMModel  $bIMModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BIMModel $bIMModel)
    {
        return $user->hasPermissionTo('view bim models');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create bim models');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\BIMModel  $bIMModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BIMModel $bIMModel)
    {
        return $user->hasPermissionTo('edit bim models');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\BIMModel  $bIMModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BIMModel $bIMModel)
    {
        return $user->hasPermissionTo('delete bim models');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\BIMModel  $bIMModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BIMModel $bIMModel)
    {
        return $user->hasPermissionTo('delete bim models');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\BIM\BIMModel  $bIMModel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BIMModel $bIMModel)
    {
        return false;
    }
}