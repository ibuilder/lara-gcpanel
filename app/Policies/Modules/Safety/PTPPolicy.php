php
<?php

namespace App\Policies\Modules\Safety;

use App\Models\Modules\Safety\PTP;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PTPPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     *