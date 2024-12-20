<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanSaoSach extends Model
{
    use HasFactory;

    protected $table = 'ban_sao_saches';
    protected $fillable = [
        'sach_id',
        'user_id',
        'the_loai_id',
        'so_phien_ban',
        'ten_sach',
        'anh_bia_sach',
        'gia_goc',
        'gia_khuyen_mai',
        'tom_tat',
        'noi_dung_nguoi_lon',
        'tinh_trang_cap_nhat',
        'kiem_duyet',
        'trang_thai',
    ];

    public function theLoai()
    {
        return $this->belongsTo(TheLoai::class, 'the_loai_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id')->withTrashed();
    }

    public function danh_gias()
    {
        return $this->hasMany(DanhGia::class, 'sach_id');
    }

    public function chuongs()
    {
        return $this->hasMany(Chuong::class, 'sach_id')->withTrashed();
    }
}
