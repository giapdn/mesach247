<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\DanhGia;
use App\Models\Sach;
use Illuminate\Http\Request;

class ThongKeDanhGiaController extends Controller
{
    public function sachDanhGiaCaoNhat(Request $request)
    {
        $danh_sach_sach = Sach::all();

        $phan_tram_rat_hay = 0;
        $phan_tram_hay = 0;
        $phan_tram_trung_binh = 0;
        $phan_tram_te = 0;
        $phan_tram_rat_te = 0;

        $sach_id = $request->input('sach_id');

        // Xử lý logic khi có yêu cầu về sách cụ thể
        if ($sach_id) {
            $tong_danh_gia = DanhGia::where('sach_id', $sach_id)
                ->selectRaw("
                SUM(CASE WHEN muc_do_hai_long = 'rat_hay' THEN 1 ELSE 0 END) as tong_rat_hay,
                SUM(CASE WHEN muc_do_hai_long = 'hay' THEN 1 ELSE 0 END) as tong_hay,
                SUM(CASE WHEN muc_do_hai_long = 'trung_binh' THEN 1 ELSE 0 END) as tong_trung_binh,
                SUM(CASE WHEN muc_do_hai_long = 'te' THEN 1 ELSE 0 END) as tong_te,
                SUM(CASE WHEN muc_do_hai_long = 'rat_te' THEN 1 ELSE 0 END) as tong_rat_te
            ")->first();
        } else {
            $tong_danh_gia = DanhGia::selectRaw("
            SUM(CASE WHEN muc_do_hai_long = 'rat_hay' THEN 1 ELSE 0 END) as tong_rat_hay,
            SUM(CASE WHEN muc_do_hai_long = 'hay' THEN 1 ELSE 0 END) as tong_hay,
            SUM(CASE WHEN muc_do_hai_long = 'trung_binh' THEN 1 ELSE 0 END) as tong_trung_binh,
            SUM(CASE WHEN muc_do_hai_long = 'te' THEN 1 ELSE 0 END) as tong_te,
            SUM(CASE WHEN muc_do_hai_long = 'rat_te' THEN 1 ELSE 0 END) as tong_rat_te
        ")->first();
        }

        $total = $tong_danh_gia->tong_rat_hay + $tong_danh_gia->tong_hay + $tong_danh_gia->tong_trung_binh + $tong_danh_gia->tong_te + $tong_danh_gia->tong_rat_te;

        $phan_tram_rat_hay = $total > 0 ? ($tong_danh_gia->tong_rat_hay / $total) * 100 : 0;
        $phan_tram_hay = $total > 0 ? ($tong_danh_gia->tong_hay / $total) * 100 : 0;
        $phan_tram_trung_binh = $total > 0 ? ($tong_danh_gia->tong_trung_binh / $total) * 100 : 0;
        $phan_tram_te = $total > 0 ? ($tong_danh_gia->tong_te / $total) * 100 : 0;
        $phan_tram_rat_te = $total > 0 ? ($tong_danh_gia->tong_rat_te / $total) * 100 : 0;

        // Kiểm tra xem có phải là yêu cầu AJAX không (tìm kiếm sách từ autocomplete)
        if ($request->ajax()) {
            return response()->json([
                'phan_tram_rat_hay' => $phan_tram_rat_hay,
                'phan_tram_hay' => $phan_tram_hay,
                'phan_tram_trung_binh' => $phan_tram_trung_binh,
                'phan_tram_te' => $phan_tram_te,
                'phan_tram_rat_te' => $phan_tram_rat_te,
            ]);
        }

         // Lấy danh sách Top 10 sách được yêu thích
        $hienThiYeuThich = Sach::with('theLoai')  
        ->withCount('nguoiYeuThich')         
        ->orderBy('nguoi_yeu_thich_count', 'desc')
        ->take(10)                         
        ->get();

        $topBaiVietBinhLuan = BaiViet::withCount('binhLuans')  
        ->orderByDesc('binh_luans_count')  
        ->take(10)  
        ->get();

        return view('admin.thong-ke.thong-ke-sach-danh-gia-cao-nhat', compact(
            'phan_tram_rat_hay',
            'phan_tram_hay',
            'phan_tram_trung_binh',
            'phan_tram_te',
            'phan_tram_rat_te',
            'danh_sach_sach',
            'hienThiYeuThich',
            'topBaiVietBinhLuan'
        ));
    }
}
