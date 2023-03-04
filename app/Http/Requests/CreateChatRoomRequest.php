<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChatRoomRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'private' => ['required', 'boolean'],
            'active' => ['required', 'boolean'],
            'password' => ['nullable', 'string', 'max:255'],
        ];
    }
}
