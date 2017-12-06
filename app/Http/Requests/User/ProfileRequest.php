<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            // Dados do usuário
            'user.name' => 'required|string|max:'.config('validation.user.name.max'),
            'user.email' => 'nullable|email|max:'.config('validation.user.email.max'),
            'password' => 'required|string|max:'.config('validation.user.password.max'),

            // New passord
            'new_password' => 'nullable|string|confirmed|different:password'
                . '|max:'.config('validation.user.password.max')
                . '|regex:'.config('validation.user.password.regex'),
        ];
    }
}
