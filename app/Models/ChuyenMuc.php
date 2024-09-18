<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuyenMuc extends Model
{
    use HasFactory;

    // Khai báo tên bảng
    protected $table = 'chuyen_mucs';

    // Khai báo các trường có thể được thêm vào từ request
    protected $fillable = [
        'ten_chuyen_muc',
        'chuyen_muc_cha_id',
    ];

    // Khóa chính
    protected $primaryKey = 'id';

    // Timestamps đã có nên giữ nguyên
    public $timestamps = true;
}
