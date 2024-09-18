<?php

namespace App\Http\Requests\Sach;

use Illuminate\Foundation\Http\FormRequest;

class ThemSachRequest extends FormRequest
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
            'ten_sach' => 'required|min:3|max:100|unique:saches,ten_sach',
            'anh_bia_sach' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gia_goc' => 'required|numeric|min:0|max:99999999',
            'tom_tat' => 'required|min:3|max:255',
            'ngay_dang' => 'required',
            'kiem_duyet' => 'required',
            'the_loai_id' => 'required',
            'gia_khuyen_mai' => 'required|numeric|min:0|max:9999999',
            'trang_thai' => 'required',
            'tinh_trang_cap_nhat' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_sach.required' => 'Tiêu đề sách là bắt buộc.',
            'ten_sach.min' => 'Tiêu đề sách phải có ít nhất 3 ký tự.',
            'ten_sach.max' => 'Tiêu đề sách không được vượt quá 100 ký tự.',
            'ten_sach.unique' => 'Tiêu đề sách đã tồn tại.',

            'anh_bia_sach.image' => 'Ảnh bìa sách phải là hình ảnh.',
            'anh_bia_sach.mimes' => 'Ảnh bìa sách phải có định dạng jpeg, png, jpg, gif hoặc svg.',
            'anh_bia_sach.max' => 'Ảnh bìa sách không được vượt quá 2MB.',

            'gia_goc.required' => 'Giá gốc là bắt buộc.',
            'gia_goc.numeric' => 'Giá gốc phải là số.',
            'gia_goc.min' => 'Giá gốc không được nhỏ hơn 0.',
            'gia_goc.max' => 'Giá gốc không được vượt quá 99.999.999.',

            'tom_tat.required' => 'Tóm tắt nội dung là bắt buộc.',
            'tom_tat.min' => 'Tóm tắt nội dung phải có ít nhất 3 ký tự.',
            'tom_tat.max' => 'Tóm tắt nội dung không được vượt quá 255 ký tự.',

            'ngay_dang.required' => 'Ngày đăng là bắt buộc.',

            'kiem_duyet.required' => 'Trạng thái kiểm duyệt là bắt buộc.',

            'the_loai_id.required' => 'Thể loại sách là bắt buộc.',

            'gia_khuyen_mai.required' => 'Giá khuyến mãi là bắt buộc.',
            'gia_khuyen_mai.numeric' => 'Giá khuyến mãi phải là số.',
            'gia_khuyen_mai.min' => 'Giá khuyến mãi không được nhỏ hơn 0.',
            'gia_khuyen_mai.max' => 'Giá khuyến mãi không được vượt quá 9.999.999.',

            'trang_thai.required' => 'Trạng thái hiển thị là bắt buộc.',

            'tinh_trang_cap_nhat.required' => 'Trạng thái cập nhật là bắt buộc.',
        ];
    }
}
