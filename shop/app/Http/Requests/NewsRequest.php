<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title'=>'required',
            'content'=>'required',
            'type_news'=>'required',
            'image'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Chưa nhập tiêu đề',
            'content.required'=>'Chưa điền nội dung',
            'type_news.required'=>'Chưa chọn loại tin mới nhất ',
            'image.required'=>'Chưa chọn ảnh'
        ];
    }
}
