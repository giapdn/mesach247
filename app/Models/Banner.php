<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';

    protected $fillable = [
        'hinh_anh',
        'noi_dung',
        'loai_banner',
        'trang_thai',
    ];
}
