<?php

namespace App\Http\Requests\CandidateRequest;

use Illuminate\Foundation\Http\FormRequest;

class CreateCandidateRequest extends FormRequest
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
                'required'
            ],
            'email' => [
                'required',
                'email:rfc',
                'unique:candidates,email'
            ],
            'phone_number' => [
                'nullable',
            ],
            'dob' => [
                'required',
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
                'mimes:jpeg,png,jpg,gif,svg',
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