php
<?php

namespace App\Policies\Modules\Preconstruction;

use App\Models\Modules\Preconstruction\QualifiedBidder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QualifiedBidderPolicy
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
        return $user->hasPermissionTo('view qualified bidders');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Preconstruction\QualifiedBidder  $qualifiedBidder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, QualifiedBidder $qualifiedBidder)
    {
        return $user->hasPermissionTo('view qualified bidders');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create qualified bidders');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Preconstruction\QualifiedBidder  $qualifiedBidder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, QualifiedBidder $qualifiedBidder)
    {
        return $user->hasPermissionTo('edit qualified bidders');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Preconstruction\QualifiedBidder  $qualifiedBidder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, QualifiedBidder $qualifiedBidder)
    {
        return $user->hasPermissionTo('delete qualified bidders');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Preconstruction\QualifiedBidder  $qualifiedBidder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, QualifiedBidder $qualifiedBidder)
    {
        return $user->hasPermissionTo('delete qualified bidders');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Preconstruction\QualifiedBidder  $qualifiedBidder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, QualifiedBidder $qualifiedBidder)
    {
        return false;
    }
}