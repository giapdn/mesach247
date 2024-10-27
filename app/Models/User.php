<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'ten_doc_gia',
        'email',
        'password',
        'so_dien_thoai',
        'hinh_anh',
        'dia_chi',
        'sinh_nhat',
        'gioi_tinh',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'deleted_at' => 'datetime',
    ];

    // Quan hệ "hasMany" giữa Tài khoản và Liên hệ (một tài khoản có nhiều liên hệ)
    public function lienHe()
    {
        return $this->hasMany(LienHe::class);
    }

    public function baiViets()
    {
        return $this->hasMany(BaiViet::class, 'user_id');
    }

    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class);
    }
    public function vai_tros()
    {
        return $this->belongsToMany(VaiTro::class, 'vai_tro_tai_khoans', 'user_id', 'vai_tro_id');
    }
    public function yeuThichSach()
    {
        return $this->belongsToMany(Sach::class, 'yeu_thiches');
    }

    public  function quyens()
    {
        return $this->vai_tros->quyens;
    }
    public function don_hangs()
    {
        return $this->hasMany(DonHang::class);
    }

    public function hasPermission($permissionName)
    {
        // Lấy ID người dùng
        $userId = $this->id;

        // Kiểm tra quyền
        return DB::table('vai_tro_tai_khoans')
            ->join('vai_tros', 'vai_tro_tai_khoans.vai_tro_id', '=', 'vai_tros.id')
            ->join('quyen_vai_tros', 'vai_tros.id', '=', 'quyen_vai_tros.vai_tro_id')
            ->join('quyens', 'quyen_vai_tros.quyen_id', '=', 'quyens.id')
            ->where('vai_tro_tai_khoans.user_id', $userId)
            ->where('quyens.ten_quyen', $permissionName)
            ->exists();
    }
    // Kiểm tra vai trò
    public function coVaiTro($vaiTroIds)
    {
        return in_array($this->role->id, (array) $vaiTroIds);
    }

    public function hasRole($roleId)
    {
        return $this->vai_tros()->where('id', $roleId)->exists();
    }

    public function sach()
    {
        return $this->hasMany(Sach::class);
    }

    // Kiểm tra quyền

    //     public function coQuyen($quyenName)
    //     {
    //         return $this->vai_tros()->whereHas('quyens', function($query) use ($quyenName) {
    //             $query->where('ten_quyen', $quyenName);
    //         })->exists();
    //     }
    //     public function getAuthPassword()
    //     {
    //         return $this->mat_khau;
    //     }
    public function sachs()
    {
        return $this->hasMany(Sach::class, 'user_id');
    }

    public function lich_su_dang_nhap(){
        return $this->hasMany(LichSuDangNhap::class, 'tai_khoan_id');
    }

    public function notifications()
    {
        return $this->hasMany(ThongBao::class);
    }
    public function kiemDuyetCongTacViens()
    {
        return $this->hasMany(KiemDuyetCongTacVien::class, 'user_id');
    }

}
