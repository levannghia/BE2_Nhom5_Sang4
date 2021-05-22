<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
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
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8',
            'confirmpassword' => 'required|same:newpassword',
        ];
    }
    public function messages()
    {
        return [
            'oldpassword.required'=>'please enter the password field',
            'newpassword.required'=>'please enter the new password field',
            'newpassword.min'=>'Password must be at least 8 characters',
            'confirmpassword.required'=>'please enter the confirm password field',
            'confirmpassword.same'=>'Confirmation password is not correct',
        ];
    }
}
