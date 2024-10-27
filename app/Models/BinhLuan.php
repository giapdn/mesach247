<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BinhLuan extends Model
{
    use HasFactory;

    protected $table = 'binh_luans';
    protected $fillable = [
        'user_id',
        'bai_viet_id',
        'noi_dung',
        'ngay_binh_luan',
        'trang_thai'
    ];

    protected $dates = ['ngay_binh_luan'];
    protected $casts = [
        'ngay_binh_luan' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function baiViet()
{
    return $this->belongsTo(BaiViet::class, 'bai_viet_id');
}

    public function getFormattedNgayBinhLuanAttribute()
    {
        return Carbon::parse($this->ngay_binh_luan)->format('d/m/Y');
    }

    const TRANG_THAI = [
        'an' => 'Ẩn',
        'hien' => 'Hiện',
    ];
    public function getTrangThaiTextAttribute()
    {
        return self::TRANG_THAI[$this->trang_thai];
    }
    const HIEN = 'hien';
    const AN = 'an';
}
