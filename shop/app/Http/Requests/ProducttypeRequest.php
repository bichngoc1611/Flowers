<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducttypeRequest extends FormRequest
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
         'name'=>'required|unique:type_products,name|min:3|max:100',
         'description'=>'required'
     ];
 }

 public function messages()
 {
    return [
     'name.required'=>'Bạn chưa nhập loại sản phẩm',
     'name.unique'=>'Tên thể loại đã tồn tại',
     'name.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.',
     'name.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.',
     'description.required'=>'Bạn chưa nhập tên mô tả.',
 ];
}
}
