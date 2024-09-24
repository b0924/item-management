<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    // app/Policies/UserPolicy.php
public function admin(User $user)
{
    return $user->role == 1; // 管理者の場合はtrueを返す
}

}
