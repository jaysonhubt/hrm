<?php

namespace App\Http\Requests\CandidateRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends FormRequest
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
            'name' => [
                'nullable'
            ],
            'email' => [
                'nullable',
                'email:rfc',
                'unique:candidates,email,' . $this->route('candidate')
            ],
            'phone_number' => [
                'nullable',
            ],
            'dob' => [
                'nullable',
                'after_or_equal:today'
            ],
            'address' => [
                'nullable'
            ],
            'experience' => [
                'nullable',
            ],
            'cv_url' => [
                'nullable',
            ],
            'cv' => [
                'nullable',
                'mimes:jpeg,png,jpg,gif,svg,pdf,docx,doc',
                'max:5120'
            ],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
 
    }
}