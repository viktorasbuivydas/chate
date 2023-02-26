<?php

namespace App\Traits;

use App\Models\User;

trait AuthorizeTrait
{

    public function isAdmin(User $user)
    {
        return $user->hasAnyRole([
            'super admin',
            'admin',
        ]);
    }

    public function isSuperAdmin(User $user)
    {
        return $user->hasRole('super admin');
    }
}
