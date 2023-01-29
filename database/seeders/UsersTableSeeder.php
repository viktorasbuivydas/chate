<?php

namespace Database\Seeders;

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
        $user = \App\Models\User::factory()->create([
            'name' => 'Viktoras',
            'email' => 'viktoras162@gmail.com',
        ]);

        $user->assignRole('super admin');
    }
}
