<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|exists:accounts,email',
            'password' => 'required'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email is required to log in.',
            'password.required' => 'Password is required to log in.'
        ];
    }
}
