<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormBillRequest extends FormRequest
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
            'name'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required|email',
            'address'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên không được bỏ trống ô này',
            'phone.required'=>'Số điện thoại không được bỏ trống ô này',
            'phone.numeric'=>'Số điện thoại phải là số',
            'email.required'=>'Quý khách không được bỏ trống ô này',
            'email.email'=>'Email không đúng đinh dạng',
            'address.required'=>'Quý khách không được bỏ trống ô này'
        ];
    }
}
