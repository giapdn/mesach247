<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'bai_viets';
    protected $fillable = [
        'user_id',
        'chuyen_muc_id',
        'hinh_anh',
        'tieu_de',
        'noi_dung',
        'ngay_dang',
        'trang_thai'
    ];
    protected $casts = [
        'ngay_dang' => 'datetime',
    ];
    public function chuyenMuc()
    {
        return $this->belongsTo(ChuyenMuc::class, 'chuyen_muc_id');
    }

    public function tacGia()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class); 
    }

    const MAU_TRANG_THAI= [
        'hien' => 'bg-success',
        'an' => 'bg-danger',
    ];
    const TRANG_THAI = [
        'an' => 'Ẩn',
        'hien' => 'Hiện',
    ];
    const HIEN = 'hien';
    const AN = 'an';
}
