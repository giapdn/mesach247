<?php

namespace App\Http\Requests\Chuong;

use Illuminate\Foundation\Http\FormRequest;

class ThemChuongRequest extends FormRequest
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
            'so_chuong' => 'required',
            'tieu_de' => 'required|min:3|max:255',
            'noi_dung' => 'required|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'so_chuong.required' => 'Số chương là bắt buộc.',
            'tieu_de.required' => 'Tiêu đề là bắt buộc.',
            'tieu_de.min' => 'Tiêu đề phải có ít nhất 3 ký tự.',
            'tieu_de.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'noi_dung.required' => 'Nội dung là bắt buộc.',
            'noi_dung.min' => 'Nội dung phải có ít nhất 10 ký tự.',
            'ngay_len_song.required' => 'Ngày lên sóng là bắt buộc.',
        ];
    }
}
