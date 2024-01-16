<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetMatKhauRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required',
            'token' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }
    public function messages()
    {
        return [
           
            'email.required' => 'Vui Lòng Nhập Email Cần ResetMatKhau',
            'token.required' => 'Token Không Tồn Tại',
            'password.required' => 'Vui Lòng Nhập Mật Khẩu Mới',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp.',
            'password_confirmation' => 'Vui Lòng Nhập Lại Mật Khẩu',
       
        
        ];
    }
}
