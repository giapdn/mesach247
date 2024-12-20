<?php

namespace App\Http\Requests\BaiViet;

use Illuminate\Foundation\Http\FormRequest;

class ThemBaiVietRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'chuyen_muc_id' => 'required|exists:chuyen_mucs,id',
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tieu_de' => 'required|string|max:255|unique:bai_viets,tieu_de',
            'noi_dung' => 'required|string|min:10',
            'trang_thai' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'chuyen_muc_id.required' => 'Chuyên mục là bắt buộc.',
            'chuyen_muc_id.exists' => 'Chuyên mục không tồn tại.',

            'hinh_anh.image' => 'Tệp phải là một hình ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải thuộc loại: jpeg, png, jpg, gif, svg.',
            'hinh_anh.max' => 'Hình ảnh không được lớn hơn 2MB.',

            'tieu_de.required' => 'Tiêu đề là bắt buộc.',
            'tieu_de.string' => 'Tiêu đề phải là một chuỗi ký tự.',
            'tieu_de.max' => 'Tiêu đề không được dài quá 255 ký tự.',
            'tieu_de.unique' => 'Tiêu đề đã tồn tại.',

            'noi_dung.required' => 'Nội dung là bắt buộc.',
            'noi_dung.string' => 'Nội dung phải là một chuỗi ký tự.',
            'noi_dung.min' => 'Nội dung phải chứa ít nhất 10 ký tự.',

            'trang_thai.required' => 'Trạng thái là bắt buộc.',
        ];
    }
}
