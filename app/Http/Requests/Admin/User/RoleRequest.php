<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'role.display_name' => 'required|string'
                .'|max:'.config('validation.role.displayName.max'),
            'role.name' => 'required|string'
                .'|unique:roles,name'.($this->method() == 'PUT' ? ", {$this->route('role.id')}" : null)
                .'|max:'.config('validation.role.name.max'),
            'role.description' => 'nullable|string'
                .'|max:'.config('validation.role.description.max'),
        ];
    }
}
