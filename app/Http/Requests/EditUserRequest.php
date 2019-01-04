<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;





class EditUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'firstname' => ['sometimes', 'string', 'max:255'],
            'lastname' => ['sometimes', 'string', 'max:255'],
            'nickname' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255'],
            'password' => ['sometimes', 'string', 'min:6', 'confirmed'],
            'role' => ['sometimes', Rule::in($this->allRoles())],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
    return [
        'role.in' => 'Unrecognized role',
    ];
    }

    private function allRoles()
    {
        $rolesCollection = Role::all();
        $rolesArray = [];
        foreach($rolesCollection as $roleObject)
        {
            $rolesArray[] = $roleObject->name;
        }
        return $rolesArray;
    }
}
