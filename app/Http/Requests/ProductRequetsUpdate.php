<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequetsUpdate extends FormRequest
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
            'name' => 'nullable|string|max:100', 
            // 'description' => 'nullable|string|min:10',
            // 'price' => 'nullable|integer',  
            'stok' => 'nullable|integer', 
            'category' => 'nullable|in:food,drink,snack', 
        ];
    }
}
