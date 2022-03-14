<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPriceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ];
    }

    public function messages(){
        return [
            'product.required' => 'Id is required.',
            'quantity.required' => 'Quantity is required.',
            'price.required' => 'Price is required.',
        ];
    }
}
