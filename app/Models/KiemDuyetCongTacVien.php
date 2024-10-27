<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KiemDuyetCongTacVien extends Model
{
    use HasFactory;
    protected $table = "kiem_duyet_cong_tac_viens";
    protected $fillable = [
        'user_id',
        'ten_doc_gia',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'sinh_nhat',
        'gioi_tinh',
        'cmnd_mat_truoc',
        'cmnd_mat_sau',
        'ghi_chu',
        'cv_pdf',
        'trang_thai'
    ];
    // Liên kết với bảng user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
