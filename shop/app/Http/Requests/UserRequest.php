<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'full_name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'repassword'=>'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required'=>'Chưa nhập tên người dùng',
            'full_name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required'=>'Chưa nhập email',
            'email.email'=>'Chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Chưa nhập password',
            'password.min'=>'Password phải có ít nhất 3 ký tự',
            'password.max'=>'Password có tối đa 32 ký tự',            
            'repassword.required'=>'Chưa nhập lại password',
            'repassword.same'=>'Password nhập lại chưa khớp'
        ];
    }
}
