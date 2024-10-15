<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminPhanHoi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'ten_doc_gia' => fake()->text(20),
                'email' => fake()->unique()->safeEmail(),
                'password' => bcrypt('admin'),
                'trang_thai' => fake()->randomElement(['hoat_dong', 'khoa']),
                'so_dien_thoai' => fake()->phoneNumber(),
                'hinh_anh' => fake()->imageUrl(),
                'dia_chi' => fake()->address(),
                'sinh_nhat' => fake()->date(),
                'gioi_tinh' => fake()->randomElement(['Nam', 'Nữ']),
                'created_at' => now()
            ]);
        }

        $this->call([

            BannerSeeder::class,
            QuyenSeeder::class,
            VaiTroSeeder::class,
            QuyenVaiTro::class,
            VaiTroTaiKhoanSeeder::class,
            ChuyenMucSeeder::class,
            BaiVietSeeder::class,
            BinhLuanSeeder::class,
            LienHeSeeder::class,
            TheLoaiSeeder::class,
            SachSeeder::class,
            YeuThichSeeder::class,
            DanhGiaSeeder::class,
            ChuongSeeder::class,
            PhuongThucThanhToanSeeder::class,
            PhanHoiKiemDuyetVienSeeder::class,
            ThongBaoSeeder::class,
            DonHangSeeder::class,
            HinhAnhBanner::class,
            RutTienSeeder::class,
            LichSuDangNhapSeeder::class
        ]);
    }
}
