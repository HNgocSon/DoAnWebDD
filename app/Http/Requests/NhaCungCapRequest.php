<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaCungCapRequest extends FormRequest
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
            'sdt' => 'required|numeric',
            'dia_chi' => 'required',
       
        ];
    }
    public function messages()
    {
        return [
            'ten.required' => 'vui lòng nhập tên nhà cung cấp',
            'dia_chi.required' => 'vui lòng chọn địa chỉ',
            'sdt.required' => 'vui lòng nhập số điện thoại',
            'sdt.numeric' => 'số điện thoại phải là số',
       
        ];
    }
}
