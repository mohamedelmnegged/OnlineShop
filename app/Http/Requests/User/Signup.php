<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Signup extends FormRequest
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
            'name'      => 'required|min:5|max:255',
            'email'     => 'required|email|min:5|max:255|unique:users,email,' . $this->id,
            'phone'     => 'required|numeric|digits_between:10,11|unique:users,phone,'. $this->id,
            'password'  => $this->check == true && $this->password != null ? 'required|min:6|confirmed' : "",
            'address'   => 'required|min:5'
        ];
    }
}
