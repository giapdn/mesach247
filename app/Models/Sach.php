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
        'tac_gia',
        'anh_bia_sach',
        'gia_goc',
        'tom_tat',
        'ngay_dang',
        'noi_dung_nguoi_lon',
        'so_luong_da_ban',
        'kiem_duyet',
        'the_loai_id',
        'user_id',
        'gia_khuyen_mai',
        'trang_thai',
        'tinh_trang_cap_nhat',
        'created_at',
        'updated_at',
    ];

    // Liên kết với bảng thể loại
    public function theLoai()
    {
        return $this->belongsTo(TheLoai::class, 'the_loai_id');
    }

    // Liên kết với bảng tài khoản
    public function tai_khoan()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function chuongs()
    {
        return $this->hasMany(Chuong::class, 'sach_id');
    }

    public function DonHang()
    {
        return $this->belongsTo(DonHang::class, 'sach_id');
    }

    public function dh()
    {
        return $this->hasOne(DonHang::class, 'sach_id'); // Thay đổi từ belongsTo sang hasOne
    }

    public function danh_gias()
    {
        return $this->hasMany(DanhGia::class, 'sach_id');
    }

    public function nguoiYeuThich()
    {
        return $this->belongsToMany(User::class, 'yeu_thiches');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    const MAU_TRANG_THAI = [
        'hien' => 'bg-success',
        'an' => 'bg-danger',
        'co' => 'bg-info',
        'khong' => 'bg-danger',
        'duyet' => 'bg-success',
        'cho_xac_nhan' => 'bg-info',
        'tu_choi' => 'bg-danger',
        'ban_nhap' => 'bg-secondary',
        'tiep_tuc_cap_nhat' => 'bg-info',
        'da_full' => 'bg-primary',
    ];
    const TRANG_THAI = [
        'an' => 'Ẩn',
        'hien' => 'Hiện',
    ];
    const TINH_TRANG_CAP_NHAT = [
        'tiep_tuc_cap_nhat' => 'Tiếp tục cập nhật',
        'da_full' => 'Đã full',
    ];
    const KIEM_DUYET = [
        'cho_xac_nhan' => 'Chờ xác nhận',
        'duyet' => 'Duyệt',
        'tu_choi' => 'Từ chối',
        'ban_nhap' => 'Bản nháp',
    ];
    const HIEN = 'hien';
    const AN = 'an';
    const DUYET = 'duyet';
    const CHO_XAC_NHAN = 'cho_xac_nhan';
    const TU_CHOI = 'tu_choi';
    const BAN_NHAP = 'ban_nhap';
    const TIEP_TUC_CAP_NHAT = 'tiep_tuc_cap_nhat';
    const DA_FULL = 'da_full';

    public function getTrangThaiHienThiAttribute()
    {
        return $this->trang_thai === 'hien' ? 'Hiện' : 'Ẩn';
    }


    public function getFormattedViewsAttribute()
    {
        $views = $this->luot_xem;
        if ($views >= 1000000) {
            return round($views / 1000000, 1) . 'M';
        } elseif ($views >= 1000) {
            return round($views / 1000, 1) . 'k';
        } else {
            return $views;
        }
    }


}
