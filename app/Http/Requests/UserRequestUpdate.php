<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest
{
    use PasswordValidationRules;
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
            'name' => 'nullable|string|min:3|max:100',
            'email' => 'nullable|email|unique:users,id',
            'password' => 'nullable|string|min:8',
            // 'password_confirmation' => 'required|same:password',
            'phone' => 'nullable|numeric',
            // 'roles' => 'nullable|string|in:ADMIN,USER',
            'roles' => 'nullable|string|in:ADMIN,STAFF,USER',
        ];
    }
}
