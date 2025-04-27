php
<?php

namespace App\Policies\Modules\Cost;

use App\Models\Modules\Cost\Invoicing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicingPolicy
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
        return $user->hasPermissionTo('view invoicings');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\Invoicing  $invoicing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Invoicing $invoicing)
    {
        return $user->hasPermissionTo('view invoicings');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create invoicings');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\Invoicing  $invoicing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Invoicing $invoicing)
    {
        return $user->hasPermissionTo('edit invoicings');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\Invoicing  $invoicing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Invoicing $invoicing)
    {
        return $user->hasPermissionTo('delete invoicings');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\Invoicing  $invoicing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Invoicing $invoicing)
    {
        return $user->hasPermissionTo('delete invoicings');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\Invoicing  $invoicing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Invoicing $invoicing)
    {
        return false;
    }
}