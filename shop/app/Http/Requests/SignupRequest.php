<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:20',            
            're_password'=>'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Vui lòng nhập email.',
            'email.email'=>'Không đúng định dạng email.',
            'email.unique'=>'Email đã có người sử dụng.',
            'password.required'=>'Vui lòng nhập mật khẩu.',      
            'password.min'=>'Mật khẩu ít nhất 6 ký tự.',
            'password.max'=>'Mật khẩu quá 20 ký tự.',
            're_password.same'=>'Mật khẩu không khớp.',
        ];
    }
}
