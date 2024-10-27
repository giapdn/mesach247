<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\DonHang;
use App\Models\TheLoai;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use App\Models\Sach;
use Illuminate\Support\Facades\DB;

class TrangChuController extends Controller
{
    public function index()
    {
        $thong_baos = ThongBao::where('user_id', auth()->id())->orderBy('created_at', 'desc')->limit(4)->get();
        $tong_thong_baos = ThongBao::where('user_id', auth()->id())->count();
        $slider = Banner::with('hinhAnhBanner')
            ->where('loai_banner', '=', 'slider')
            ->where('trang_thai', '=', 'hien')
            ->first();
        $sliderFooter = Banner::with('hinhAnhBanner')
            ->where('loai_banner', '=', 'footer')
            ->where('trang_thai', '=', 'hien')
            ->first();
        return view('client.home', [
            'hotBooks' => Sach::all(),
            'thong_baos' => $thong_baos,
            'tong_thong_baos' => $tong_thong_baos,
            'slider' => $slider,
            'sliderFooter' => $sliderFooter,
            'newBooks' => Sach::orderBy('ngay_dang', 'desc')->where('kiem_duyet', 'duyet')->where('trang_thai', '=', 'hien')->limit(6)->get(),
            'fulledBooks' => Sach::orderBy('ngay_dang', 'desc')
                ->where('trang_thai', '=', 'hien')
                ->where('kiem_duyet', '=', 'duyet')
                ->where('tinh_trang_cap_nhat', '=', 'da_full')
                ->limit(12)->get(),
            'the_loais' => TheLoai::all(),
            'sach_moi_cap_nhats' => Sach::with('theLoai')
                ->orderBy('updated_at', 'desc')
                ->where('trang_thai', '=', 'hien')
                ->limit(20)
                ->get(),
            'sach_de_cu_thangs' => DonHang::select('sach_id', DB::raw('COUNT(sach_id) as total_sales'))
                ->where('trang_thai', 'thanh_cong')
                ->groupBy('sach_id')
                ->orderByDesc('total_sales')
                ->limit(6)
                ->with('sach')
                ->get()
        ]);
    }
}
