<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAndPasswordRequest extends FormRequest
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
            'login' => 'required',
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!$this->input('login')) {
                        $fail('Please enter your login before entering a password.');
                    }
                },
            ],
        ];
    }
}
