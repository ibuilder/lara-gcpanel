php
<?php

namespace App\Policies\Modules\Cost;

use App\Models\Modules\Cost\TMMTicket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TMMTicketPolicy
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
        return $user->hasPermissionTo('view tmmtickets');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\TMMTicket  $tMMTicket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TMMTicket $tMMTicket)
    {
        return $user->hasPermissionTo('view tmmtickets');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create tmmtickets');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\TMMTicket  $tMMTicket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TMMTicket $tMMTicket)
    {
        return $user->hasPermissionTo('edit tmmtickets');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\TMMTicket  $tMMTicket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TMMTicket $tMMTicket)
    {
        return $user->hasPermissionTo('delete tmmtickets');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\TMMTicket  $tMMTicket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TMMTicket $tMMTicket)
    {
        return $user->hasPermissionTo('delete tmmtickets');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\TMMTicket  $tMMTicket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TMMTicket $tMMTicket)
    {
        return false;
    }
}