<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'username_email' => 'required|string|exists:users,email',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'username_email.required' => 'E-mail is required',
            'password.required' => 'Password is required',
            'username_email.exists' => 'User does not exists in our records',
            'password.min' => 'Password must be at least 8 characters',
        ];
    }
}
