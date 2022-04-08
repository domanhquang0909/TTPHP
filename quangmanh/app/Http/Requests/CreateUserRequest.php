<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'mail_address'=> 'required|email|max:100|unique:users,mail_address',

            'password'=>'required|min:6|max:255',
            'password_confirm'=>'required|same:password',
            'name'=>'required|min:3|max:255',
            'address'=>'max:255',
            'phone'=>'alpha_num|max:15'
        ];
    }
}
