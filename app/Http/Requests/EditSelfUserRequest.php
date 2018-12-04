<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use Spatie\Permission\Models\Role;




class EditSelfUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Hash::check(Auth::User()->password, $this->input('password_old'));
    }

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
