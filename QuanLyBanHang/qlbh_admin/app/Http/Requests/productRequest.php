<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'id_type' => 'required',
            'unit_price' => 'required|numeric|min:3',
            'promotion_price' => 'numeric',
            'unit' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên sản phẩm !',
            'id_type.required' => 'Chưa chọn loại sản phẩm !',
            'unit_price.required' => 'Chưa nhập giá sản phẩm !',
            'unit_price.numeric' => 'Giá là số !',
            'unit_price.min' => 'Giá thấp nhất là 3 số !',
            'promotion_price.numeric' => 'Giá khuyến mại là số !',
            'unit.required' => 'Chưa nhập đơn vị tính của sản phẩm !'
        ];
    }
}
