<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUser extends Request
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
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'full_name' => 'required',
            'password' => 'required|confirmed'
        ];
    }

}
