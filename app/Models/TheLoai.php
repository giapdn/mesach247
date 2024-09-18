<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    protected $table= 'the_loais';
    protected $fillable = [
        'ten_the_loai',
        'anh_the_loai',
        'mo_ta',
        'trang_thai',
        'created_at',
        'updated_at'
    ];

    public function saches()
    {
        return $this->hasMany(Sach::class, 'the_loai_id');
    }
}
