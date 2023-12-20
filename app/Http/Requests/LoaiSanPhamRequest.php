<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiSanPhamRequest extends FormRequest
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
            
            'ten_loai' => 'required|between:2,20',
            
        ];
    }
    public function messages()
    {
        return [
           
            'ten_loai.required' => 'vui lòng nhập tên loại sản phẩm',
            'ten_loai.between' => 'tên loại phải từ :min ký tự dến :max',
       
        
        ];
    }
}
