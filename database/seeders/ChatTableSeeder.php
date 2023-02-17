<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Seeder;

class ChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chatRooms = collect(config('chat'));

        $chatRooms->each(function ($chatRoom) {
            Chat::create($chatRoom);
        });
    }
}
