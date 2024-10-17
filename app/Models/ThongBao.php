<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;
    protected $table = 'thong_baos';
    protected $fillable = [
        'user_id',
        'user_ids',
        'tieu_de',
        'noi_dung',
        'trang_thai',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'user_ids' =>'array'
    ];
    const TRANG_THAI = [
        'da_xem' => 'Đã Xem',
        'chua_xem' => 'Chưa Xem',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
