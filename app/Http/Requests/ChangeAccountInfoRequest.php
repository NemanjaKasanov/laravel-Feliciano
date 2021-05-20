<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeAccountInfoRequest extends FormRequest
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
            'phone' => 'required|max:20',
            'address' => 'required|max:100',
            'municipality' => 'required|max:50'
        ];
    }

    public function messages(){
        return [
            'phone.required' => 'Phone number is required.',
            'address.required' => 'Address is required.',
            'municipality.required' => 'Municipality is required.'
        ];
    }
}
