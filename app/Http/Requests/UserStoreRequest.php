<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class UserStoreRequest extends FormRequest
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
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'username' => 'required|string|min:8|max:20|alpha_num',
            'email' => 'required|email',
            'has_company' => 'required|boolean',
            'address.street' => 'required|string',
            'address.city' => 'required|string',
            'address.zipcode' => 'required|string',
            'address.country_id' => 'required|exists:countries,id',
            'company.name' => 'required_if:has_company,1,true',
            'company.description' => 'required_if:user.has_company,1,true',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required',
            'first_name.alpha' => 'First name should only contain letters',
            'last_name.required' => 'Last name is required',
            'last_name.alpha' => 'Last name should only contain letters',
            'username.required' => 'Username is required',
            'username.min' => 'Username should be at least :min characters long',
            'username.max' => 'Username should be no more than :max characters long',
            'username.alpha_num' => 'Username should only contain numbers and letters',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'address.street.required' => 'Street Address is required',
            'address.city.required' => 'City is required',
            'address.zipcode.required' => 'Zip code is required',
            'has_company.boolean' => 'Checkbox value not valid',
            'address.country_id.required' => 'Please select a country',
            'address.country_id.exists' => 'Selected Country does not exist',
            'company.name.required_if' => 'Company name is required',
            'company.description.required_if' => 'Company description is required',
        ];
    }
}
