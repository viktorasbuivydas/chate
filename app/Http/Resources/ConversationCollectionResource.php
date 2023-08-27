<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConversationCollectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'message' => [
                'content' => $this->latestMessage->message,
                'user' => $this->latestMessage->sender->id === auth()->id()
                    ? new UserResource($this->latestMessage->receiver)
                    : new UserResource($this->latestMessage->sender),
            ],
            'receiver' => new UserResource($this->receiver),
        ];
    }
}
