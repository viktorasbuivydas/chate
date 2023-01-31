<?php

namespace Tests\Unit\Actions\Chat;

use Tests\TestCase;
use App\Events\MessageSent;
use App\Events\ChatMessageSent;
use App\Actions\Chat\CreateMessage;
use Tests\Support\Traits\UserTrait;
use Illuminate\Support\Facades\Event;

class ChatMessageTest extends TestCase
{
    use UserTrait;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_can_create_chat_message()
    {
        Event::fake();

        $user = $this->createUser();

        $data = [
            'message' => 'Hello World',
            'user_id' => $user->id,
        ];

        app(CreateMessage::class)->handle($data);

        $this->assertDatabaseHas('chat_messages', $data);
        $this->assertDatabaseCount('chat_messages', 1);

        Event::assertDispatched(fn (ChatMessageSent $event) => $event->message === $data['message']);
    }
}
