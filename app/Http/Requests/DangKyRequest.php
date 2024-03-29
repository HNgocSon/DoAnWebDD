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
            'email' => 'required|email',
            'sdt' => 'required|between:8,10',
            'password' => 'required|min:6',
            'dia_chi' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ten.required' => 'Vui lòng Nhập Tên',
            'email.required' => 'Vui lòng Nhập Email',  
            'email.email' => 'Định dạng Email không hợp lệ',
            'sdt.required' => 'Vui lòng Nhập Số Điện Thoại',
            'sdt.between' => 'Số điện thoại không hợp lệ',
            'password.required' => 'Vui lòng Nhập Mật Khẩu ',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'dia_chi.required' => 'Vui lòng Nhập Địa Chỉ',
        ];
    }

}
