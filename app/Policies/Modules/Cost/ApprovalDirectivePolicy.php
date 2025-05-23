php
<?php

namespace App\Policies\Modules\Cost;

use App\Models\Modules\Cost\ApprovalDirective;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApprovalDirectivePolicy
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
        return $user->hasPermissionTo('view approval directives');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\ApprovalDirective  $approvalDirective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ApprovalDirective $approvalDirective)
    {
        return $user->hasPermissionTo('view approval directives');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create approval directives');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\ApprovalDirective  $approvalDirective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ApprovalDirective $approvalDirective)
    {
        return $user->hasPermissionTo('edit approval directives');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\ApprovalDirective  $approvalDirective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ApprovalDirective $approvalDirective)
    {
        return $user->hasPermissionTo('delete approval directives');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\ApprovalDirective  $approvalDirective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ApprovalDirective $approvalDirective)
    {
        return $user->hasPermissionTo('delete approval directives');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\ApprovalDirective  $approvalDirective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ApprovalDirective $approvalDirective)
    {
        return false;
    }
}