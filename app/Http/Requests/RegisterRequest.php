<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|unique:accounts,email|email|max:100',
            'phone' => 'required|max:20',
            'address' => 'required|max:100',
            'municipality' => 'required|max:50',
            'password' => 'required|confirmed|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Phone number is required.',
            'address.required' => 'Address is required.',
            'municipality.required' => 'Municipality is required.',
            'password.required' => 'Password is required.',
            'password.regex' => 'Password must have at least one upper case letter, one lower case letter and one digit.'
        ];
    }
}
