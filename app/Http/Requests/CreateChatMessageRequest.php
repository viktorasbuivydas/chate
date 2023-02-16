<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChatMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'max:255'],
        ];
    }
}
