<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    // Chỉ định bảng tương ứng với model
    protected $table = 'bai_viets';

    // Các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'chuyen_muc_id',
        'tieu_de',
        'noi_dung',
        'hinh_anh',
        'ngay_dang',
    ];

    // Các thuộc tính không thể gán hàng loạt
    protected $guarded = [];
}
