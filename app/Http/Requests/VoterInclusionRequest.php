<?php

namespace App\Http\Requests;

use App\Models\VoterInclusion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VoterInclusionRequest extends FormRequest
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
            'surname' => 'required|string',
            'other_names' => 'required|string',
            'phone' => 'required|digits:10|'.Rule::unique(VoterInclusion::class).'|max:10|min:6',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(VoterInclusion::class),
            ],
            'voter_id' => 'required|digits:6|'.Rule::unique(VoterInclusion::class),
            // 'level' => 'required|string',
            'email_update' => 'nullable',
            'phone_update' => 'nullable',
            'voter_id_update' => 'nullable',
            'voter_inclusion' => 'nullable',
        ];
    }

    /**
     * Get the validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'voter_id.required' => 'The member id field is required',
            'voter_id.unique' => 'The member id already exist',
            'voter_id.numeric' => 'The member id is incorrect',
            'surname.required' => 'Your first name is required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->email_update == 0 && $this->phone_update == 0 && $this->voter_inclusion == 0) {
                $validator->errors()->add('voter_inclusion', 'Please select an option');
                $validator->errors()->add('phone_update', 'Please select an option');
                $validator->errors()->add('email_update', 'Please select an option');
            }
        });
    }
}
