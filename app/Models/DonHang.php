<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hangs';

    protected $fillable = [
        'sach_id',
        'user_id',
        'phuong_thuc_thanh_toan_id',
        'ma_don_hang',
        'so_tien_thanh_toan',
        'trang_thai',
        'mo_ta',
        'payment_link',
        'expires_at'
    ];

    protected $casts = [
      'expries_at' => 'datetime',
    ];

    public function sach(){
        return $this->hasOne(Sach::class, 'id', 'sach_id')->withTrashed();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function phuongThucThanhToan(){
        return $this->belongsTo(PhuongThucThanhToan::class);
    }
    public function contributorCommissionEarnings()
    {
        return $this->hasOne(ContributorCommissionEarning::class, 'id_don_hang');
    }
}
