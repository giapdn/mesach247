<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;

    protected $table = 'saches';
    protected $fillable = [
        'ten_sach',
        'anh_bia_sach',
        'gia_goc',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'ngay_dang',
        'so_luong_da_ban',
        'trang_thai',
    ];
    public $timestamps = false;

    // Liên kết với bảng thể loại
    public function theLoai()
    {
        return $this->belongsTo(TheLoai::class, 'the_loai_id');
    }
   // Liên kết với bảng tài khoản
    public function tacGia()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
