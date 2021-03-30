<?php

namespace App\Http\Requests\Admin;

use App\Rules\checkImage;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class ProductCheck extends FormRequest
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
        'name'  => ['required', 'min:3', 'unique:products,name,'. $this->id /*Rule::unique('products')->ignore($this->id)*/],
            'price' => 'required|numeric',
            'description'   => 'required|min:3',
            'quantity'      => 'required|numeric',
            'image'
                => [ new RequiredIf(! $this->oldImage != null ), 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                //in the above make it required when add but not required when eidt

        ];
    }
    public function messages(){
        return [
        ];
    }
}
