<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            'ten' => 'required',
            'email' => 'required',
            'sdt' => 'required|numeric|between:8,12',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'dia_chi' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ten.required' => 'Vui Lòng Nhập Tên',
            'email.required' => 'Vui Lòng Nhập Email',
            'sdt.required' => 'Vui lòng Nhập Số Điện Thoại',
            'sdt.numeric' => 'Vui Lòng Nhập Số',
            'sdt.between' => 'số điện thoại không hợp lệ',
            'password.required' => 'Vui Lòng Nhập Lại Mật Khẩu Mới',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp.',
            'password_confirmation' => 'Vui Lòng Nhập Lại Mật Khẩu',
            'dia_chi.required' => 'Vui lòng Nhập Địa Chỉ',
       
        
        ];
    }
}
