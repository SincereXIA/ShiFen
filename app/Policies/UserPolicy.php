<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function firstUserInfo($user)
    {
        return $user->userInfo == null;
    }

    public function showUserInfo($user, $user_id)
    {
        return $user->id == $user_id;
    }
}
