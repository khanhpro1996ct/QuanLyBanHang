<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'name' => 'required',
            're_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập vào email',
            'email.email' => 'Không đúng định dạng email',
            'email.unique' => 'Email đã có người sử dụng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            're_password.same' => 'Mật khẩu không giống nhau',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự'
        ];
    }
}
