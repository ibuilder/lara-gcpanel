php
<?php

namespace App\Policies\Modules\Field;

use App\Models\Modules\Field\DailyReport;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DailyReportPolicy
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
        return $user->hasPermissionTo('view daily reports');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\DailyReport  $dailyReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DailyReport $dailyReport)
    {
        return $user->hasPermissionTo('view daily reports');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create daily reports');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\DailyReport  $dailyReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DailyReport $dailyReport)
    {
        return $user->hasPermissionTo('edit daily reports');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\DailyReport  $dailyReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DailyReport $dailyReport)
    {
        return $user->hasPermissionTo('delete daily reports');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\DailyReport  $dailyReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DailyReport $dailyReport)
    {
        return $user->hasPermissionTo('delete daily reports');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Field\DailyReport  $dailyReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DailyReport $dailyReport)
    {
        return false;
    }
}