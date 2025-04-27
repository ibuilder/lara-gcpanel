php
<?php

namespace App\Policies\Modules\Closeout;

use App\Models\Modules\Closeout\AtticStock;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AtticStockPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user