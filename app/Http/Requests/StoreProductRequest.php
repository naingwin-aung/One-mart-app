<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class StoreProductRequest extends FormRequest
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
            'product_image' => 'required|image',
            'category_id' => 'required',  
            'phone' => 'required|numeric|digits_between:10,11',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Your product name cannot be empty",
            'price.required' => 'Product price cannot be empty',
            'product_image.required' => 'Your product image is required',
            'category_id.required' => 'Product category is required',
            'phone.required' => 'Your Phone number cannot be empty',
            'phone.numeric' => 'Phone number must be numbers',
            'phone.digits_between' => 'Your Phone number is not vaild',
        ];
    }
}
