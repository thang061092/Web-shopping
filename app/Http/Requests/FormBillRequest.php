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
            'email'=>'required|email|unique:customers,email',
            'address'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Quý Khách không được bỏ trống ô này',
            'phone.required'=>'Quý Khách không được bỏ trống ô này',
            'phone.numeric'=>'Số điệm thoại phải là số',
            'email.required'=>'Quý khách không được bỏ trống ô này',
            'email.unique'=>'Email đã được sử dụng',
            'address.required'=>'Quý khách không được bỏ trống ô này'
        ];
    }
}
