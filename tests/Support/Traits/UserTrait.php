<?php

namespace Tests\Support\Traits;

use App\Models\User;

trait UserTrait
{
    public function createUser($data = [])
    {
        return User::factory()->create($data);
    }
}
