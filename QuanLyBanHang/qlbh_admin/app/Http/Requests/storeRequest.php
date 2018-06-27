<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            'address' => 'required',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|email|unique:store,email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên cửa hàng !',
            'address.required' => 'Chưa nhập địa chỉ !',
            'phone.required' => 'Chưa nhập số điện thoại !',
            'phone.numeric' => 'Số điện thoại phải là số !',
            'phone.min' => 'Số điện thoại thấp nhất là 10 số !',
            'email.required' => 'Chưa nhập email !',
            'email.email' => 'Chưa đúng định dạng email !',
            'email.unique' => 'Email đã tồn tại !'
        ];
    }
}
