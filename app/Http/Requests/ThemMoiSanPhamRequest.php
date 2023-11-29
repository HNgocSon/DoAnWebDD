<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemMoiSanPhamRequest extends FormRequest
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
                'ten_loai' => 'required',
                'gia' => 'required|numeric',
                'mo_ta' => 'required',
                'so_luong' => 'required',
                'mau' => 'required',
                'man_hinh' => 'required',
                'camera' => 'required',
                'he_dieu_hanh' => 'required',
                'chip' => 'required',
                'ram' => 'required',
                'dung_luong' => 'required',
                'pin' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ten.required' => 'Vui Lòng nhập tên sản phẩm',
            'ten_loai.required' => 'chọn loại',
            'gia.required' => 'vui lòng nhập giá tiền',
            'gia.numeric' => 'giá tiền phải là số',
            'mo_ta.required' => 'vui lòng nhập mô tả',
            'so_luong.required' => 'vui lòng nhập số lượng',
            'mau.required' => 'vui lòng nhập màu',
            'man_hinh.required' => 'vui lòng nhập màng hình',
            'camera.required' => 'vui lòng nhập camera',
            'he_dieu_hanh.required' => 'vui lòng nhập Hệ Điều hành',
            'chip.required' => 'vui lòng nhập chip',
            'ram.required' => 'vui lòng nhập ram',
            'dung_luong.required' => 'vui lòng nhập dung lượng',
            'pin.required' => 'vui lòng nhập pin',
        ];
    }
}
