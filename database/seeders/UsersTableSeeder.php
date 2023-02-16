<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Viktoras',
            'email' => 'viktoras162@gmail.com',
        ]);

        $user->assignRole('super admin');

        $user = User::factory()->create([
            'name' => 'test',
            'email' => 'test@gmail.com',
        ]);
    }
}
