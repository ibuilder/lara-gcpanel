php
<?php

namespace App\Policies\Modules\Engineering;

use App\Models\Modules\Engineering\MeetingAgendaMinutes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeetingAgendaMinutesPolicy
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
        return $user->hasPermissionTo('view meetingagendaminutes');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\MeetingAgendaMinutes  $meetingAgendaMinutes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MeetingAgendaMinutes $meetingAgendaMinutes)
    {
        return $user->hasPermissionTo('view meetingagendaminutes');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create meetingagendaminutes');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\MeetingAgendaMinutes  $meetingAgendaMinutes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MeetingAgendaMinutes $meetingAgendaMinutes)
    {
        return $user->hasPermissionTo('edit meetingagendaminutes');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\MeetingAgendaMinutes  $meetingAgendaMinutes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MeetingAgendaMinutes $meetingAgendaMinutes)
    {
        return $user->hasPermissionTo('delete meetingagendaminutes');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\MeetingAgendaMinutes  $meetingAgendaMinutes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MeetingAgendaMinutes $meetingAgendaMinutes)
    {
        return $user->hasPermissionTo('delete meetingagendaminutes');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Engineering\MeetingAgendaMinutes  $meetingAgendaMinutes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MeetingAgendaMinutes $meetingAgendaMinutes)
    {
        return false;
    }
}