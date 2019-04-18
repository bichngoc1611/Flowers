<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'producttype_id' =>'required',
            'price' =>'required|numeric|min:1',
            'promotion_price' => 'required',
            'image' => 'required',
            'new' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'producttype_id.required' => 'Chưa chọn thể loại',
            'price.required' => 'Chưa nhập giá',
            'price.numeric' => 'Nhập số',
            'price.min' => 'Giá thấp nhất là 1',
            'promotion_price.required' => 'Chưa nhập giá khuyến mãi',
            'image.required' => 'Chưa chọn ảnh',
            'new.required' => 'Chưa chọn sản phẩm mới '
        ];
    }
}
