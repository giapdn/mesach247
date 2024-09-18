<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SuaTheLoaiRequest extends FormRequest
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
        // Lấy ID từ route
        $id = $this->route('the_loai');

        return [
            'ten_the_loai' => [
                'required',
                Rule::unique('the_loais', 'ten_the_loai')->ignore($id),
            ],
            'anh_the_loai' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
            'mo_ta' => 'nullable|max:500',
            'trang_thai' => 'required',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ten_the_loai.required' => 'Vui lòng nhập tên thể loại',
            'ten_the_loai.unique' => 'Tên thể loại đã tồn tại',
            'anh_the_loai.image' => 'Phải là ảnh',
            'anh_the_loai.mimes' => 'Ảnh sai định dạng. Các định dạng hợp lệ: jpeg, png, jpg, gif, svg',
            'anh_the_loai.max' => 'Kích thước ảnh không được vượt quá 2048 kilobytes',
            'mo_ta.max' => 'Mô tả không được vượt quá 500 ký tự',
            'trang_thai.required' => 'Vui lòng chọn trạng thái',
        ];
    }
}
