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
        'tieu_de',
        'noi_dung',
        'trang_thai',
        'url',
        'type',
        'created_at',
        'updated_at'
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
