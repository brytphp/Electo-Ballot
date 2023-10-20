<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OTPVerificationRequest extends FormRequest
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
            'verification_code' => 'required|size:4',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (auth()->user()->otp != $this->verification_code) {
                $validator->errors()->add('verification_code', 'Invalid verification code');
            }
        });
    }
}
