<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'price' => 'required|numeric',
            'phone' => 'numeric|digits_between:10,11',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Your product name cannot be empty",
            'price.required' => 'Product price cannot be empty',
            'phone.numeric' => 'Phone number must be numbers',
            'phone.digits_between' => 'Your Phone number is not vaild',
        ];
    }
}
