<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Определить право пользователя для выполнеия запроса
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила, которые должны применяться к запросу
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:60'
            ],
            'password' => [
                'required',
                'max:255'
            ],
        ];
    }
}
