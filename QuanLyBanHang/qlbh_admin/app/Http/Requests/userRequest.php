<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|numeric|min:3',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên sản phẩm !',
            'email.required' => 'Chưa chọn loại sản phẩm !',
            'password.required' => 'Chưa nhập giá sản phẩm !',
            'phone.required' => 'Chưa nhập số điện thoại !',
            'phone.min' => 'Giá thấp nhất là 10 số !',
            'address.required' => 'Giá khuyến mại là số !',
        ];
    }
}
