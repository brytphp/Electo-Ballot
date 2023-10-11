<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'first_name' => 'required',
            'other_names' => 'nullable',
            'password' => 'nullable',
            'role' => 'required',
            'phone' => ['nullable', 'phone:AUTO,GH'],
            'email' => ['required', 'email', 'unique:users,email'],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.phone' => 'Invalid phone number',
        ];
    }
}
