<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Admin extends FormRequest
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
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:admins,email,'.$this->id,
            'password'  => [
                            $this->password != null ? 'min:6' : "", //to check for min if user add chars
                            $this->check == true? 'required':"", //to check for add new or edit exist
                            $this->check == true? 'min:6':"", //to check for add new or edit exist
                            $this->check == true? 'confirmed':"", //to check for add new or edit exist
            ],
            'phone'     => 'required|min:10|numeric|unique:admins,phone,'.$this->id,
        ];
    }
}
