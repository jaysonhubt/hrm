<?php

namespace App\Http\Requests\RecruitmentRequest;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecruitmentRequest extends FormRequest
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
            'position' => [
                'required'
            ],
            'description' => [
                'required'
            ],
            'quantity' => [
                'required',
            ],
            'jd_url' => [
                'nullable',
            ],
            'start_time' => [
                'nullable',
                'after_or_equal:today'
            ],
            'end_time' => [
                'nullable',
                'required_with:start_time',
                'after_or_equal:start_time'
            ],
            'jd' => [
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