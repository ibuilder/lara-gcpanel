php
<?php

namespace App\Policies\Modules\Cost;

use App\Models\Modules\Cost\BudgetForecast;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BudgetForecastPolicy
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
        return $user->hasPermissionTo('view budget forecasts');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\BudgetForecast  $budgetForecast
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BudgetForecast $budgetForecast)
    {
        return $user->hasPermissionTo('view budget forecasts');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create budget forecasts');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\BudgetForecast  $budgetForecast
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BudgetForecast $budgetForecast)
    {
        return $user->hasPermissionTo('edit budget forecasts');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\BudgetForecast  $budgetForecast
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BudgetForecast $budgetForecast)
    {
        return $user->hasPermissionTo('delete budget forecasts');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\BudgetForecast  $budgetForecast
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BudgetForecast $budgetForecast)
    {
        return $user->hasPermissionTo('delete budget forecasts');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modules\Cost\BudgetForecast  $budgetForecast
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BudgetForecast $budgetForecast)
    {
        return false;
    }
}