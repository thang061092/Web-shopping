<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAddRequest extends FormRequest
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
            'name'=>'required|max:255',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric|min:1',
            'desc'=>'required',
            'image'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên sản phẩm không được để trống',
            'name.max'=>'Tên sản phẩm không được vượt quá 255 kí tự',
            'price.required'=>'Giá sản phẩm không được để trống',
            'price.numeric'=>'Giá sản phẩm phải là số',
            'quantity.required'=>'Số lượng sản phẩm không được để trống',
            'quantity.numeric'=>'Số lượng sản phẩm phải là số',
            'desc.required'=>'Mô tả sản phẩm không được để trống',
            'image.required'=>'ảnh sản phẩm không được để trống'
        ];

    }
}
