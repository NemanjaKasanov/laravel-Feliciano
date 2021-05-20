<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'category' => 'required',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'time_to_make' => 'required|integer',
            'ingredients' => 'required',
            'extras' => 'nullable'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Name is required.',
            'category.required' => 'Category is required.',
            'description.required' => 'Description is required.',
            'image.required' => 'Image is required.',
            'time_to_make.required' => 'Time to make is required.',
            'ingredients.required' => 'At least one ingredient is required.'
        ];
    }
}
