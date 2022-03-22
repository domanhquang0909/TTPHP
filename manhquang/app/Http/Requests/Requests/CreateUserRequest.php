<?php

namespace App\Http\Requests\Requests;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            //
            'mail_address' => 'required|max:255',
            'password'=>'required|min:3|max:20',
            'password_confirm'=>'required|same:password',
            'name'=>'required|min:3|max:255',
            'address'=>'max:255',
            'phone'=>'max:15'
        ];
    }
}
