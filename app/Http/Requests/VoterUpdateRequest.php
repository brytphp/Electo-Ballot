<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoterUpdateRequest extends FormRequest
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
            'email' => 'required|email',
            'country_code' => 'required',
            'phone' => 'required|phone:'.$this->country_code,
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     */
    public function messages(): array
    {
        return [
            'phone.phone' => 'Please provide a valid phone number',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->country_code == 'GH') {
                if (! in_array(substr($this->phone, 0, 3), local_network_prefix()) && strlen($this->phone) == 10) {
                    $validator->errors()->add('phone', 'Please provide a valid phone number');
                }
            }
        });
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([]);
    }
}
