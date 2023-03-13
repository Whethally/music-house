<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStepOneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'step_one_input' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (empty($value) && $this->input('step') > 1) {
                        $fail('Please fill in the first input before proceeding to the next step.');
                    }
                },
            ],
        ];
    }
}
