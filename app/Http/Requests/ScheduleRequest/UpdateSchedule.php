<?php

namespace App\Http\Requests\ScheduleRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchedule extends FormRequest
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
            'user_id' => [
                'nullable',
                'exists:users,id'
            ],
            'candidate_id' => [
                'nullable',
                'exists:candidates,id'
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
            'link_meeting' => [
                'nullable',
            ],
            'type' => [
                'nullable'
            ]
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