<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConversationMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'max:255'],
            'receiver_id' => ['required', 'exists:users,id'],
        ];
    }
}
