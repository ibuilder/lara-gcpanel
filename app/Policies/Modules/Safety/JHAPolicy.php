php
<?php

namespace App\Policies\Modules\Safety;

use App\Models\Modules\Safety\JHA;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JHAPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     *