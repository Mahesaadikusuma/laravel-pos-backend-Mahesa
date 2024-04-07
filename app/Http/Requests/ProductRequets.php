<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequets extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:products|string|min:3|max:100', 
            'description' => 'required|string|min:10',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'price' => 'required|integer',  
            'stok' => 'required|integer', 
            'category' => 'required|in:food,drink,snack', 
        ];
    }
}
