<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch($this->method()) {
            case 'PUT':
                return [
                    'user.name' => 'required|string|max:'.config('validation.user.name.max'),
                    'user.email' => 'nullable|email|max:'.config('validation.user.email.max'),
                    'user.password' => 'nullable|string'
                        . '|max:'.config('validation.user.password.max')
                        . '|regex:'.config('validation.user.password.regex'),
                    'role_id' => 'required|integer',
                ];
                break;

            default:
                return [
                    'user.name' => 'required|string|max:'.config('validation.user.name.max'),
                    'user.email' => 'nullable|email|max:'.config('validation.user.email.max'),
                    'user.username' => 'required|string|unique:users,username|max:'.config('validation.user.username.max'),
                    'user.password' => 'required|string'
                        . '|max:'.config('validation.user.password.max')
                        . '|regex:'.config('validation.user.password.regex'),
                    'role_id' => 'required|integer',
                ];
                break;
        }        
    }
}
