<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Checkout extends FormRequest
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
            'email'     => 'required|email|min:5',
            'name'      => 'required|min:3',
            'address'   => 'required|min:5',
            'city'      => 'required|min:3',
            'provance'  => 'required|min:3',
            'postal'    => 'required|numeric',
            'phone'     => 'required|digits_between:10,11',
            'nameOnCard'=> 'required|min:5',
            'credit'    => 'required|numeric',
            'user_id'   => 'required'
        ];
    }
}
