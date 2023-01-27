<?php

namespace App\Actions\Profile;

use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUserAction implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        $user->deleteProfilePhoto();
        $user->delete();
    }
}
